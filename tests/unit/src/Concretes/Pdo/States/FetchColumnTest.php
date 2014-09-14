<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Concretes\Pdo\States;

use Concretehouse\Dp\Repository\Concretes\Pdo\States\FetchColumn;

/**
 * Test for Pdo State for PDOStatement::fetchColumn().
 */
class FetchColumnTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->state = new FetchColumn(
            'SELECT * FROM test WHERE id = :id',
            array(
                ':id' => array(1, \PDO::PARAM_INT),
                ':first_name' => array('Abe'),
                ':last_name' => 'Shinzou',
            ),
            2
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
    public function canSetColumnNumberWithConstructor()
    {
        $this->assertSame(2, $this->state->getNumber());
    }

    /**
     * @test
     */
    public function canSetColumnNumberWithSetter()
    {
        $this->state->setNumber(10);
        $this->assertSame(10, $this->state->getNumber());
    }
}
