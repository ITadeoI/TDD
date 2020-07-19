<?php

use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/19/20
 * Time: 9:44 AM
 */

class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsReturned()
    {
        $person = new App\Doctor('Lidia');

        $this->assertEquals('Dr. Lidia', $person->getNameAndTitle());
    }

    public function testNameAndTitleIncludesValueFromGetTitle()
    {
        $mock = $this->getMockBuilder(\App\AbstractPerson::class)
            ->setConstructorArgs(['Lidia'])
            ->getMockForAbstractClass();

        $mock->method('getTitle')
            ->willReturn('Dr.');

        $this->assertEquals($mock->getNameAndTitle(), 'Dr. Lidia');


    }

}