<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Repository;

use Phake;

/**
 * Test for repository factory interface.
 */
class FactoryInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Repository\FactoryInterface');
    }
}
