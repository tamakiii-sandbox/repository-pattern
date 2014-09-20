<?php

namespace Concretehouse\Dp\Repository\Test\Concretes\Pdo\States;

use Concretehouse\Dp\Repository\Concretes\Pdo\States\FetchObject;

/**
 * Test for Pdo State for PDOStatement::fetchObject().
 */
class FetchObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->state = new FetchObject(
            'SELECT * FROM test WHERE id = :id',
            array(
                ':id' => array(1, \PDO::PARAM_INT),
                ':first_name' => array('Abe'),
                ':last_name' => 'Shinzou',
            ),
            'HogeClass',
            array('fuga')
        );
    }

    /**
     * @test
     */
    public function extendedAbstract()
    {
        $this->assertInstanceOf('Concretehouse\Dp\Repository\Concretes\Pdo\States\ReadAbstract', $this->state);
    }

    /**
     * @test
     */
    public function canSetClassNameWithConstructor()
    {
        $this->assertSame('HogeClass', $this->state->getClass());
    }

    /**
     * @test
     */
    public function canCtorArgsWithConstructor()
    {
        $this->assertSame(array('fuga'), $this->state->getCArgs());
    }

    /**
     * @test
     */
    public function canSetClassNameWithSetter()
    {
        $this->state->setClass('FugaClass');
        $this->assertSame('FugaClass', $this->state->getClass());
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
