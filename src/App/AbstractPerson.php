<?php
/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/19/20
 * Time: 9:37 AM
 */

namespace App;


abstract class AbstractPerson
{

    protected $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    abstract protected function getTitle();

    public function getNameAndTitle()
    {
        return $this->getTitle() . ' ' . $this->username;
    }


}