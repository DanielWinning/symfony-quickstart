<?php

namespace App\Tests\PHP\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testShouldCreateInstanceOfUser()
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
        $this->assertNull($user->getId());
        $this->assertNull($user->getEmail());
        $this->assertEquals('', $user->getUserIdentifier());

        $user->setEmail('test@test.com');

        $this->assertEquals('test@test.com', $user->getEmail());
        $this->assertEquals('test@test.com', $user->getUserIdentifier());
        $this->assertEquals(['ROLE_USER'], $user->getRoles());

        $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

        $this->assertEquals(['ROLE_ADMIN', 'ROLE_USER'], $user->getRoles());
        $this->assertNull($user->getPassword());
        $this->assertNull($user->getPlainPassword());

        $user->setPassword('test');
        $user->setPlainPassword('test');

        $this->assertEquals('test', $user->getPassword());
        $this->assertEquals('test', $user->getPlainPassword());

        $user->eraseCredentials();

        $this->assertNull($user->getPlainPassword());
    }
}