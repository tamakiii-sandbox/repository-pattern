<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Mediator;

use Phake;

/**
 * Test for mediatable interface.
 */
class MediatableInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Mediator\MediatableInterface');
    }
}
