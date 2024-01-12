<?php

namespace Hexlet\Phpunit;

use PHPUnit\Framework\TestCase;
use Hexlet\Phpunit\Cart;

class CartTest extends TestCase
{
    public function testCart(): void
    {
        // BEGIN (write your solution here)
        $cart = new Cart();
        $good = ['name' => 'car', 'price' => 100];
        $count = 3;
        $cart->addItem($good, $count);
        $exepted = [['good' => $good, 'count' => $count]];
        $this->assertEquals($exepted, $cart->getItems());
        //count($cart->getItems()) // 2
        $this->assertTrue($cart->getCount() === 3);
        $cart->addItem(['name' => 'tv', 'price' => 10], 5);
        $this->assertTrue($cart->getCost() === 350);
        //$cart->getCost() // 350
        // END
    }
}
