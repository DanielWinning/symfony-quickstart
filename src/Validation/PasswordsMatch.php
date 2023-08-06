<?php

namespace App\Validation;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class PasswordsMatch extends Constraint
{
    public string $message = 'Passwords do not match.';
}