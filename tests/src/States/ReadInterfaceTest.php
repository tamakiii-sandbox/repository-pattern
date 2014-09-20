<?php

namespace Concretehouse\Dp\Repository\Test\Concrete\Pdo\States;

use Phake;

/**
 * Test for read state interface.
 */
class ReadInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\States\ReadInterface');
    }
}
