<?php
/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/19/20
 * Time: 9:47 AM
 */

namespace App;


class Doctor extends AbstractPerson
{
    public function getTitle()
    {
        return 'Dr.';
    }

}