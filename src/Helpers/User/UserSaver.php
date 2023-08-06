<?php

namespace App\Helpers\User;

use App\DTO\RegistrationDTO;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserSaver
{
    private UserPasswordHasherInterface $passwordHasher;
    private EntityManagerInterface $entityManager;

    /**
     * @param UserPasswordHasherInterface $passwordHasher
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager)
    {
        $this->passwordHasher = $passwordHasher;
        $this->entityManager = $entityManager;
    }

    /**
     * @param RegistrationDTO $data
     *
     * @return void
     */
    public function save(RegistrationDTO $data): void
    {
        $user = new User();
        $password = $this->passwordHasher->hashPassword($user, $data->getPassword());
        $user->setEmail($data->getEmail());
        $user->setPassword($password);
        $user->setRoles(['ROLE_USER']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}