<?php

namespace App\DTO;

use App\Validation\EmailAddressNotInUse;
use App\Validation\PasswordsMatch;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationDTO
{
    #[Assert\Email]
    #[EmailAddressNotInUse]
    private string $email;

    #[Assert\Length(
        min: 8,
        minMessage: 'Your password must contain a minimum of {{ limit }} characters.'
    )]
    private string $password;

    #[PasswordsMatch]
    private string $confirmPassword;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }

    /**
     * @param string $confirmPassword
     *
     * @return void
     */
    public function setConfirmPassword(string $confirmPassword): void
    {
        $this->confirmPassword = $confirmPassword;
    }
}