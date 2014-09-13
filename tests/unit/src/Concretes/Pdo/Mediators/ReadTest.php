<?php

namespace Concretehouse\Dp\Repository\Test\Unit\Concretes\Pdo\Mediators;

use Concretehouse\Dp\Repository\Concretes\Pdo\Mediators\Read;
use Concretehouse\Dp\Repository\Concretes\Pdo\Colleagues;
use Phake;

/**
 * Test for Pdo read mediator.
 */
class ReadTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        // Prepare depended objects
        $this->stmt = Phake::mock('\PDOStatement');
        $this->pdo = Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\Pdo');
        $this->state = Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\StateInterface');
        $this->colleagues = new Colleagues($this->pdo, $this->state);

        // Prepare mocks
        Phake::when($this->pdo)->prepare(Phake::anyParameters())->thenReturn($this->stmt);

        // Prepare test target
        $this->mediator = new Read;
    }

    /**
     * @test
     * @dataProvider statementsDataProvider
     */
    public function callPdoPrepareWithQueryAndOption($state)
    {
        // Prepare colleagues
        $this->colleagues->setState($state);

        // Execute
        $this->mediator->mediate($this->colleagues);

        // Verify
        Phake::verify($this->pdo, Phake::times(1))
            ->prepare(
                $state->getQuery(),
                $state->getOptions()
            );
    }

    /**
     * @test
     * @dataProvider statementsDataProvider
     */
    public function callStatementBindValue($state)
    {
        // Prepare state mock
        Phake::when($state)->getValues()->thenReturn(array(
            'hoge' => array('hhhh', \PDO::PARAM_STR),
            'fuga' => array(1234, \PDO::PARAM_INT),
        ));

        // Prepare colleagues
        $this->colleagues->setState($state);

        // Exeute
        $this->mediator->mediate($this->colleagues);

        // Verify
        Phake::verify($this->stmt, Phake::times(1))
            ->bindValue('hoge', 'hhhh', \PDO::PARAM_STR);
        Phake::verify($this->stmt, Phake::times(1))
            ->bindValue('fuga', 1234, \PDO::PARAM_INT);
    }

    /**
     * @test
     */
    public function callPdoStatementFetchWithFetchObject()
    {
        // Prepare state
        $state = $this->getStateMock('fetch');
        Phake::when($state)->getStyle()->thenReturn(\PDO::FETCH_COLUMN);
        Phake::when($state)->getOrientation()->thenReturn(\PDO::FETCH_ORI_REL);
        Phake::when($state)->getOffset()->thenReturn(1);

        // Prepare colleagues
        $this->colleagues->setState($state);

        // Execute
        $this->mediator->mediate($this->colleagues);

        // Verify
        Phake::verify($this->stmt, Phake::times(1))
            ->fetch(
                $state->getStyle(),
                $state->getOrientation(),
                $state->getOffset()
            );
    }

    /**
     * @test
     */
    public function callPdoStatementFetchAllWithFetchAllObject()
    {
        // Prepare state
        $state = $this->getStateMock('all');
        Phake::when($state)->getStyle()->thenReturn(\PDO::FETCH_CLASS);
        Phake::when($state)->getArgs()->thenReturn('stdClass');
        Phake::when($state)->getCArgs()->thenReturn(array('hoge'));

        // Prepare colleagues
        $this->colleagues->setState($state);

        // Execute
        $this->mediator->mediate($this->colleagues);

        // Verify
        Phake::verify($this->stmt, Phake::times(1))
            ->fetchAll(
                $state->getStyle(),
                $state->getArgs(),
                $state->getCArgs()
            );
    }

    /**
     * @test
     */
    public function callPdoStatementFetchColumnWithFetchColumnObject()
    {
        // Prepare state
        $state = $this->getStateMock('column');
        Phake::when($state)->getNumber()->thenReturn(12345);

        // Prepare colleagues
        $this->colleagues->setState($state);

        // Execute
        $this->mediator->mediate($this->colleagues);

        // Verify
        Phake::verify($this->stmt, Phake::times(1))
            ->fetchColumn(
                $state->getNumber()
            );
    }

    /**
     * @test
     */
    public function callPdoStatementFetchObjectWithFetchObjectObject()
    {
        // Prepare state
        $state = $this->getStateMock('object');
        Phake::when($state)->getClass()->thenReturn('HogeClass');
        Phake::when($state)->getCArgs()->thenReturn(array('hoge'));

        // Prepare colleagues
        $this->colleagues->setState($state);

        // Execute
        $this->mediator->mediate($this->colleagues);

        // Verify
        Phake::verify($this->stmt, Phake::times(1))
            ->fetchObject(
                $state->getClass(),
                $state->getCArgs()
            );
    }

    /**
     * @return array
     */
    public function statementsDataProvider()
    {
        return array_map(function($state) {
            return array($state);
        }, $this->getStateMocks());
    }

    /**
     * @return mock
     */
    private function getStateMock($name)
    {
        $states = $this->getStateMocks();
        return $states[$name];
    }

    /**
     * @return array
     */
    private function getStateMocks()
    {
        return array_map(function($state) {
            Phake::when($state)->getQuery()->thenReturn('SELECT * FROM test');
            Phake::when($state)->getValues()->thenReturn(array());
            return $state;
        }, array(
            'fetch' => Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\States\Fetch'),
            'all' => Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\States\FetchAll'),
            'column' => Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\States\FetchColumn'),
            'object' => Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\States\FetchObject'),
        ));
    }
}
