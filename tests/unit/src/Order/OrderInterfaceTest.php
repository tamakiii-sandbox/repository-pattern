<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Order;

use Phake;

/**
 * Test for OrderInterface.
 */
class OrderInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Order\OrderInterface');
    }
}
