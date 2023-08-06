<?php

namespace App\Validation;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class EmailAddressNotInUse extends Constraint
{
    public string $message = 'The email address {{ emailAddress }} is already in use. Please login or create an account using a different email address';
}