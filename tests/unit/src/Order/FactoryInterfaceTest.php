<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Order;

use Phake;

/**
 * Test for order factory interface.
 */
class FactoryInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Order\FactoryInterface');
    }
}
