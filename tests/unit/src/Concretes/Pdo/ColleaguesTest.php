<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Concretes\Pdo;

use Concretehouse\Dp\Repository\Concretes\Pdo\Colleagues;
use Phake;

/**
 * Test for pdo colleagues.
 */
class ColleaguesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->pdo = Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\PdoInterface');
        $this->state = Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\StateInterface');

        $this->colleagues = new Colleagues($this->pdo, $this->state);
    }

    /**
     * @test
     */
    public function implementsColleaguesInterface()
    {
        $this->assertInstanceOf('Concretehouse\Dp\Repository\Concretes\Pdo\ColleaguesInterface', $this->colleagues);
    }

    /**
     * @test
     */
    public function canSetPdoWithConstructor()
    {
        $this->assertSame($this->pdo, $this->colleagues->getPdo());
    }

    /**
     * @test
     */
    public function canSetStateWithConstructor()
    {
        $this->assertSame($this->state, $this->colleagues->getState());
    }
}
