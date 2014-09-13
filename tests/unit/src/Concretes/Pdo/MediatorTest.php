<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Concretes\Pdo;

use Concretehouse\Dp\Repository\Concretes\Pdo\Mediator;
use Phake;

/**
 * Test for Pdo mediator.
 */
class MediatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->mediator = new Mediator;
    }

    /**
     * @test
     */
    public function extendsParentMediatorInterface()
    {
        $this->assertInstanceOf('Concretehouse\Dp\Repository\Mediator\MediatorInterface', $this->mediator);
    }
}
