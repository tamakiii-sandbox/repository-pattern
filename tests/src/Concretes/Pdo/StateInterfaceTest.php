<?php

namespace Concretehouse\Dp\Repository\Test\Concretes\Pdo;

use Phake;

/**
 * Test for Pdo state interface.
 */
class StateInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\StateInterface');
    }
}
