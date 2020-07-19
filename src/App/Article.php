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

    protected $article_id;

    public function __construct()
    {
        $this->article_id = rand();
    }

    public function getSlug(): string
    {
        $slug = $this->title;

        $slug = preg_replace('/\s+/', '_', $slug);

        $slug = preg_replace('/[^\w]+/', '', $slug);

        return trim($slug,'_');
    }

    public function getDescription(): string
    {
        return $this->getID() . $this->getToken();
    }

    protected function getID(): int
    {
        return rand();
    }

    private function getToken(): string
    {
        return uniqid();
    }

    private function getPrefixedToken(string $prefix): string
    {
        return uniqid($prefix);
    }
}