<?php

namespace Concretehouse\Dp\Repository\Test;

use Phake;

/**
 * Test for Pdo mediator.
 */
class MediatorColleaguesInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function instantiatable()
    {
        Phake::mock('Concretehouse\Dp\Repository\MediatorColleaguesInterface');
    }
}
