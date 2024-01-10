<?php

namespace Php\Package\Tests;

use PHPUnit\Framework\TestCase;

use function Hexlet\Phpunit\set;

class SetTest extends TestCase
{
    private $coll;

    public function setUp(): void
    {
        $this->coll = ["a" => ["b" => ["c" => 3]]];
    }

    public function testSet(): void
    {
        $coll2 = ['a', 'b', 'c'];
        $value = 4;
        set($this->coll, $coll2, $value);
        $expected = ["a" => ["b" => ["c" => 4]]];
        $this->assertEquals($expected, $this->coll);
        $col13 = ['x', 'y', 'z'];
        $value1 = 5;
        set($this->coll, $col13, $value1);
        $expected1 = ["a" => ["b" => ["c" => 4]], "x" => ["y" => ["z" => 5]]];
        $this->assertEquals($expected1, $this->coll);
    }
}
