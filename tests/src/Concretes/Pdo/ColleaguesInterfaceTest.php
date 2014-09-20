<?php

namespace Concretehouse\Dp\Repository\Test\Concretes\Pdo;

use Phake;

/**
 * Test for pdo colleagues interface.
 */
class ColleaguesInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\ColleaguesInterface');
    }

    /**
     * @test
     */
    public function implementsParentColleaguesInterface()
    {
        Phake::mock('Concretehouse\Dp\Repository\Mediator\ColleaguesInterface');
    }
}
