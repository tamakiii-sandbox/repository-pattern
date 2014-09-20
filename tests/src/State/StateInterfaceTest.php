<?php

namespace Concretehouse\Dp\Repository\Test\State;

use Phake;

/**
 * Test for StateInterface.
 */
class StateInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\State\StateInterface');
    }
}
