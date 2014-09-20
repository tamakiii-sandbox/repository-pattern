<?php

namespace Concretehouse\Dp\Repository\Test\Mediator;

use Phake;

/**
 * Test for Pdo mediator.
 */
class ColleaguesInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function instantiatable()
    {
        Phake::mock('Concretehouse\Dp\Repository\Mediator\ColleaguesInterface');
    }
}
