<?php

namespace App\Validation;

use App\Repository\UserRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class EmailAddressNotInUseValidator extends ConstraintValidator
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param mixed $value
     * @param Constraint $constraint
     *
     * @return void
     * @throws NonUniqueResultException
     */
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof EmailAddressNotInUse) {
            throw new UnexpectedTypeException($constraint, EmailAddressNotInUse::class);
        }

        $email = $this->context->getRoot()->getData()->getEmail();
        $user = $this->userRepository->getUserByEmail($email);

        if ($user) {
            $this->context
                ->buildViolation($constraint->message)
                ->setParameter('{{ emailAddress }}', $email)
                ->addViolation();
        }
    }
}