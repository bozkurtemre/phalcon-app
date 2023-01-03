<?php

namespace App\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\ResultsetInterface;
use Phalcon\Mvc\ModelInterface;

abstract class CacheableModel extends Model
{
    public static function find($parameters = null): ResultsetInterface
    {
        $parameters = self::checkCacheParameters($parameters);
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null): ModelInterface|null
    {
        $parameters = self::checkCacheParameters($parameters);
        return parent::findFirst($parameters);
    }

    protected static function checkCacheParameters($parameters = null)
    {
        if (null !== $parameters) {
            if (true !== is_array($parameters)) {
                $parameters = [$parameters];
            }

            if (true !== isset($parameters['cache'])) {
                $parameters['cache'] = [
                    'key' => self::generateCacheKey($parameters),
                    'lifetime' => 300,
                ];
            }
        }

        return $parameters;
    }

    protected static function generateCacheKey(array $parameters): string
    {
        $uniqueKey = [];

        foreach ($parameters as $key => $value) {
            if (true === is_scalar($value)) {
                $uniqueKey[] = $key . ':' . $value;
            } elseif (true === is_array($value)) {
                $uniqueKey[] = sprintf(
                    '%s:[%s]',
                    $key,
                    self::generateCacheKey($value)
                );
            }
        }

        return join(',', $uniqueKey);
    }
}