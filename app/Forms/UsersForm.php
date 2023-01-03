<?php

namespace App\Forms;

use Phalcon\Filter\Validation\Validator\Email;
use Phalcon\Filter\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;

class UsersForm extends Form
{
    /**
     * @param null $entity
     * @param array $options
     */
    public function initialize($entity = null, array $options = [])
    {
        // In edition the id is hidden
        if (!empty($options['edit'])) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id');
        }

        $this->add($id);

        $name = new Text('name', [
            'placeholder' => 'Name',
        ]);

        $name->addValidators([
            new PresenceOf([
                'message' => 'The name is required',
            ]),
        ]);

        $this->add($name);

        $email = new Text('email', [
            'placeholder' => 'Email',
        ]);

        $email->addValidators([
            new PresenceOf([
                'message' => 'The e-mail is required',
            ]),
            new Email([
                'message' => 'The e-mail is not valid',
            ]),
        ]);

        $this->add($email);
    }
}
