<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Concretes\Pdo\States;

use Concretehouse\Dp\Repository\Concretes\Pdo\States\FetchAll;

/**
 * Test for Pdo State for PDOStatement::fetchAll().
 */
class FetchAllTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->state = new FetchAll(
            'SELECT * FROM test WHERE id = :id',
            array(
                ':id' => array(1, \PDO::PARAM_INT),
                ':first_name' => array('Abe'),
                ':last_name' => 'Shinzou',
            ),
            \PDO::FETCH_CLASS,
            'stdClass',
            array('hoge')
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
    public function canSetFetchArgumentWithConstructor()
    {
        $this->assertSame('stdClass', $this->state->getArgs());
    }

    /**
     * @test
     */
    public function canSetCtorArgsWithConstructor()
    {
        $this->assertSame(array('hoge'), $this->state->getCArgs());
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
    public function canSetFetchArgumentWithSetter()
    {
        $this->state->setArgs(null);
        $this->assertSame(null, $this->state->getArgs());
    }

    /**
     * @test
     */
    public function canSetCtorArgsWithSetter()
    {
        $this->state->setCArgs(array());
        $this->assertSame(array(), $this->state->getCArgs());
    }
}
