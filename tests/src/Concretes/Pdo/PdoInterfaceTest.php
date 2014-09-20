<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Concretes\Pdo;

use Concretehouse\Dp\Repository\Concretes\Pdo\PdoInterface;
use Phake;

/**
 * Test for pdo interface.
 */
class PdoInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\PdoInterface');
    }
}
