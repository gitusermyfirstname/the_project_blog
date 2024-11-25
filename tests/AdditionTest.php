<?php

use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testAddition()
    {
        $result = addition(1, 2);
        $this->assertEquals(3, $result);
    }
}