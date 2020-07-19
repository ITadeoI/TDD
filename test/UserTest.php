<?php

use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/19/20
 * Time: 10:37 AM
 */

class UserTest extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        $user = new App\User('alice@wonderlands');

        $mailer = $this->createMock(App\Mailer::class);

        $mailer->expects($this->once())
            ->method('send')
            ->willReturn(true);

        $user->setMailer($mailer);

        $this->assertTrue($user->notify('hellow'));
    }
}