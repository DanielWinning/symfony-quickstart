<?php

namespace App\Validation;

use App\DTO\RegistrationDTO;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class PasswordsMatchValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     *
     * @return void
     */
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof PasswordsMatch) {
            throw new UnexpectedTypeException($constraint, PasswordsMatch::class);
        }

        /**
         * @var RegistrationDTO $data
         */
        $data = $this->context->getRoot()->getData();

        if ($data->getPassword() !== $data->getConfirmPassword()) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}