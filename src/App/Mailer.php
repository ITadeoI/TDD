<?php
/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/19/20
 * Time: 10:05 AM
 */

namespace App;



use InvalidArgumentException;

class Mailer
{
    public function send(string $email, string $message)
    {
        if(empty($email)) {
            throw new InvalidArgumentException;
        }

        echo "Send $message to $email";

        return true;
    }

}