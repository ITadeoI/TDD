<?php
/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/19/20
 * Time: 10:34 AM
 */

namespace App;


class User
{
    public $email;

    protected $mailer;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify(string $message)
    {
        //return call_user_func([$this->mailer], $this->email, message);

        return $this->mailer->send($this->email, $message);
    }

}