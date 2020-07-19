<?php

namespace App;


/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/19/20
 * Time: 8:57 AM
 */

class ArticleChild extends Article
{
    public function getID(): int
    {
        return parent::getID();
    }
}