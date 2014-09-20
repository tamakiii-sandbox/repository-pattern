<?php

namespace Concretehouse\Dp\Repository\Test;

use Phake;

/**
 * Test for state factory interface.
 */
class StateFactoryInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\StateFactoryInterface');
    }
}
