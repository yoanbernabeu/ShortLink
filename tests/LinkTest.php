<?php

namespace App\Tests;

use App\Entity\Link;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{
    public function testIfTrue(): void
    {
        $link = new Link();

        $link->setLink('http://www.google.com')
             ->setShort('ABC123');

        $this->assertEquals('http://www.google.com', $link->getLink());
        $this->assertEquals('ABC123', $link->getShort());
    }

    public function testIfFalse(): void
    {
        $link = new Link();

        $link->setLink('http://www.google.com')
             ->setShort('ABC123');

        $this->assertNotEquals('http://www.false.com', $link->getLink());
        $this->assertNotEquals('false   ', $link->getShort());
    }

    public function testIfNull(): void
    {
        $link = new Link();

        $this->assertNull($link->getLink());
        $this->assertNull($link->getShort());
    }
}
