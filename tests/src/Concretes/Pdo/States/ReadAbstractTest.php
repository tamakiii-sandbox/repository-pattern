<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Concretes\Pdo;

use Concretehouse\Dp\Repository\Concretes\Pdo\States\ReadAbstract;

class State extends ReadAbstract {}

/**
 * Test for abstract class of read-states.
 */
class ReadAbstractTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->state = new State(
            'SELECT * FROM test WHERE id = :id', array(
                ':id' => array(1, \Pdo::PARAM_INT),
                ':first_name' => array('Abe'),
                ':last_name' => 'Shinzou',
            )
        );
    }

    /**
     * @test
     */
    public function implementingStateInterface()
    {
        $this->assertInstanceOf('Concretehouse\Dp\Repository\Concretes\Pdo\StateInterface', $this->state);
    }

    /**
     * @test
     */
    public function canInstantiateWithoutValues()
    {
        $state = new State('SELECT * FROM test');

        $this->assertSame('SELECT * FROM test', $state->getQuery());
        $this->assertSame(array(), $state->getValues());
    }

    /**
     * @test
     */
    public function canSetQueryWithConstructor()
    {
        $this->assertSame('SELECT * FROM test WHERE id = :id', $this->state->getQuery());
    }

    /**
     * @test
     */
    public function canSetValuesWithConstructor()
    {
        $this->assertSame(
            array(
                ':id' => array(1, \PDO::PARAM_INT),
                ':first_name' => array('Abe', \PDO::PARAM_STR),
                ':last_name' => array('Shinzou', \PDO::PARAM_STR),
            ),
            $this->state->getValues()
        );
    }

    /**
     * @test
     */
    public function canSetQueryWithSetter()
    {
        $this->state->setQuery('SELECT * FROM test');
        $this->assertSame('SELECT * FROM test', $this->state->getQuery());
    }

    /**
     * @test
     */
    public function canAddValuesWithAdder()
    {
        $this->state->addValue(':gender', 4, \PDO::PARAM_INT);
        $this->state->addValue(':job', 'Premier');

        $this->assertSame(
            array(
                ':id' => array(1, \PDO::PARAM_INT),
                ':first_name' => array('Abe', \PDO::PARAM_STR),
                ':last_name' => array('Shinzou', \PDO::PARAM_STR),
                ':gender' => array(4, \PDO::PARAM_INT),
                ':job' => array('Premier', \PDO::PARAM_STR),
            ),
            $this->state->getValues()
        );
    }

    /**
     * @test
     */
    public function canSetDriverOptionsWithSetter()
    {
        $this->state->setOptions(array(150, 'red'));
        $this->assertSame(array(150, 'red'), $this->state->getOptions());
    }
}
