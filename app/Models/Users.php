<?php

namespace App\Models;

use Phalcon\Filter\Validation;
use Phalcon\Filter\Validation\Validator\Uniqueness;
use Phalcon\Mvc\Model;

/**
 * All the users registered in the application
 */
class Users extends Model
{
    /**
     * @var integer
     */
    public int $id;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $password;

    public function initialize()
    {
        //
    }

    /**
     * Before create the user assign a password
     */
    public function beforeValidationOnCreate()
    {
        //
    }

    /**
     * Send a confirmation e-mail to the user if the account is not active
     */
    public function afterCreate()
    {
        //
    }

    /**
     * Validate that emails are unique across users
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add('email', new Uniqueness([
            "message" => "The email is already registered",
        ]));

        return $this->validate($validator);
    }
}
