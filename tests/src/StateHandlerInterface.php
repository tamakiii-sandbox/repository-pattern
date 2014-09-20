<?php

namespace Concretehouse\Dp\Repository\Test;

use Phake;

/**
 * Test for state handler interface.
 */
class StateHandlerInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canUse()
    {
        Phake::mock('Concretehouse\Dp\Repository\StateHandlerInterface');
    }
}
