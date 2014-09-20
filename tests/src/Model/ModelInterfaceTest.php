<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Model;

use Phake;

/**
 * Test for model interface.
 */
class ModelInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canImplement()
    {
        Phake::mock('Concretehouse\Dp\Repository\Model\ModelInterface');
    }
}
