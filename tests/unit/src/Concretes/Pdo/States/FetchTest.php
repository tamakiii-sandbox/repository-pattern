<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Concretes\Pdo\States;

use Concretehouse\Dp\Repository\Concretes\Pdo\States\Fetch;

/**
 * Test for Pdo State for PDOStatement::fetch().
 */
class FetchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->state = new Fetch(
            'SELECT * FROM test WHERE id = :id',
            array(
                ':id' => array(1, \PDO::PARAM_INT),
                ':first_name' => array('Abe'),
                ':last_name' => 'Shinzou',
            ),
            \PDO::FETCH_CLASS,
            \PDO::FETCH_ORI_ABS,
            10
        );
    }

    /**
     * @test
     */
    public function extendedAbstract()
    {
        $this->assertInstanceOf('Concretehouse\Dp\Repository\Concretes\Pdo\StateAbstract', $this->state);
    }

    /**
     * @test
     */
    public function canSetFetchStyleWithConstructor()
    {
        $this->assertSame(\PDO::FETCH_CLASS, $this->state->getStyle());
    }

    /**
     * @test
     */
    public function canSetCursorOrientationWithConstructor()
    {
        $this->assertSame(\PDO::FETCH_ORI_ABS, $this->state->getOrientation());
    }

    /**
     * @test
     */
    public function canSetCursorOffsetWithConstructor()
    {
        $this->assertSame(10, $this->state->getOffset());
    }

    /**
     * @test
     */
    public function canSetFetchStyleWithSetter()
    {
        $this->state->setStyle(\PDO::FETCH_ASSOC);
        $this->assertSame(\PDO::FETCH_ASSOC, $this->state->getStyle());
    }

    /**
     * @test
     */
    public function canSetCursorOrientationWithSetter()
    {
        $this->state->setOrientation(\PDO::FETCH_ORI_REL);
        $this->assertSame(\PDO::FETCH_ORI_REL, $this->state->getOrientation());
    }

    /**
     * @test
     */
    public function canSetCursorOffsetWithSetter()
    {
        $this->state->setOffset(100);
        $this->assertSame(100, $this->state->getOffset());
    }
}
