<?php

namespace Concretehouse\Dp\Repository\Test\Unit\State;

use Phake;

/**
 * Test for state factory interface.
 */
class FactoryInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\State\FactoryInterface');
    }
}
