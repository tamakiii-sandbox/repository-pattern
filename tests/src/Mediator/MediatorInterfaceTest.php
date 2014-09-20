<?php

namespace Concretehouse\Dp\Repository\Test\Mediator;

use Phake;

/**
 * Test for mediatable interface.
 */
class MediatorInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Mediator\MediatorInterface');
    }
}
