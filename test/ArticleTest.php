<?php

use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/17/20
 * Time: 7:23 PM
 */

class ArticleTest extends TestCase
{
    protected $article;

    public function setUp(): void
    {
        $this->article = new App\Article();
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(), '');
    }

//    public function testSpaceInTitleIsReplacedInUnderscoreInSlug()
//    {
//        $this->article->title = "this title has spaces";
//
//        $this->assertEquals( $this->article->getSlug(),'this_title_has_spaces');
//    }
//
//    public function testSlugHasWhiteSpaceReplacedBySingleUnderscore()
//    {
//        $this->article->title = "this   title   has   \n  spaces";
//
//        $this->assertEquals( $this->article->getSlug(),'this_title_has_spaces');
//    }
//
//    public function testSlugDoesNotStartOrEndWithAnUnderscore()
//    {
//        $this->article->title = "    this   title   has   \n  spaces  ";
//
//        $this->assertEquals($this->article->getSlug(), 'this_title_has_spaces');
//    }
//
//    public function testSlugDoesNotHaveAnyNonWordCharacters()
//    {
//        $this->article->title = "Read! This! Now!";
//
//        $this->assertEquals($this->article->getSlug(), 'Read_This_Now');
//
//    }

    public function titleProvider()
    {
        return [
            'Space In the Title Is Replaced By Underscore In Slug'
            => ["this title has spaces", "this_title_has_spaces"],
            'Slug Has White Space Replaced By Single Underscore'
            => ["this   title   has   \n  spaces", "this_title_has_spaces"],
            'Slug Does Not Start Or End With An Underscore'
            => ["    this   title   has   \n  spaces  ", "this_title_has_spaces"],
            'Slug Does Not Have Any Non Word Characters'
            => ["Read! This! Now!", 'Read_This_Now']
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug(), $slug);
    }

    public function testGetDescriptionDoesNotReturnEmptyvalue()
    {
        $this->assertNotEmpty($this->article->getDescription());
    }

    public function testGetIdIsInt()
    {
        $articleChild = new \App\ArticleChild();

        $this->assertIsInt($articleChild->getID());
    }

    public function testGetTokenIsString()
    {
        $reflector = new ReflectionClass($this->article);

        $method = $reflector->getMethod('getToken');

        $method->setAccessible(true);

        $result = $method->invoke($this->article);

        $this->assertIsString($result);
    }

    public function testGetPrefixTokenIsString()
    {
        $reflector = new ReflectionClass($this->article);

        $method = $reflector->getMethod('getPrefixedToken');

        $method->setAccessible(true);

        $result = $method->invokeArgs($this->article, ['example']);

        $this->assertStringStartsWith('example', $result);

    }

    public function TestIDIsAnInteger()
    {
        $reflector = new ReflectionClass($this->article);

        $property = $reflector->getProperty('article_id');

        $property->setAccessible(true);

        $value = $property->getValue($this->article);

        $this->assertIsInt($value);
    }
}