<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->setPasswordHasher($passwordHasher);
    }

    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $manager->persist(
            $this->createAdminUser(
                $_ENV['ADMIN_EMAIL'],
                $_ENV['ADMIN_PASSWORD'],
                true
            )
        );
        UserFactory::createMany(10);

        $manager->flush();
    }

    /**
     * @param string $email
     * @param string $password
     * @param bool $isDeveloper
     *
     * @return User
     */
    private function createAdminUser(string $email, string $password, bool $isDeveloper = false): User
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($this->getPasswordHasher()->hashPassword($user, $password));
        $user->setRoles($isDeveloper ? ['ROLE_DEVELOPER', 'ROLE_USER'] : ['ROLE_ADMIN', 'ROLE_USER']);

        return $user;
    }

    /**
     * @return UserPasswordHasherInterface
     */
    private function getPasswordHasher(): UserPasswordHasherInterface
    {
        return $this->passwordHasher;
    }

    /**
     * @param UserPasswordHasherInterface $passwordHasher
     *
     * @return void
     */
    private function setPasswordHasher(UserPasswordHasherInterface $passwordHasher): void
    {
        $this->passwordHasher = $passwordHasher;
    }
}
