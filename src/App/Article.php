<?php
/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/17/20
 * Time: 7:27 PM
 */

namespace App;

class Article
{
    public $title;

    public function getSlug(): string
    {
        $slug = $this->title;

        $slug = preg_replace('/\s+/', '_', $slug);

        $slug = preg_replace('/[^\w]+/', '', $slug);

        return trim($slug,'_');
    }
}