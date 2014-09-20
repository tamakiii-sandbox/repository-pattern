<?php

namespace Concretehouse\Dp\Repository\Test\Concretes\Pdo;

use Concretehouse\Dp\Repository\Concretes\Pdo\Mediator;
use Phake;

/**
 * Test for Pdo mediator.
 */
class MediatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->factory = Phake::mock('Concretehouse\Dp\Factory\FactoryInterface');
        $this->state = Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\StateInterface');
        $this->colleagues = Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\ColleaguesInterface');

        Phake::when($this->colleagues)->getState()->thenReturn($this->state);

        $this->mediator = new Mediator($this->factory);
    }

    /**
     * @test
     */
    public function extendsParentMediatorInterface()
    {
        $this->assertInstanceOf('Concretehouse\Dp\Repository\Mediator\MediatorInterface', $this->mediator);
    }

    /**
     * @test
     */
    public function mediatesWithReadMediatorIfReadStateWasSpecified()
    {
        // Prepare params
        $state = $this->getState('read');
        $mediator = $this->getMediator('read');

        // Set state to colleagues
        Phake::when($this->colleagues)->getState()->thenReturn($state);

        // Register 'read' mediator
        Phake::when($this->factory)
            ->create('read')
            ->thenReturn($mediator);

        // Execute
        $this->mediator->mediate($this->colleagues);

        // Verify
        Phake::verify($mediator, Phake::times(1))
            ->mediate($this->colleagues);
    }

    /**
     * @param string $name
     * @return mock
     */
    private function getState($name)
    {
        $states = $this->getStates();
        return $states[$name];
    }

    /**
     * @return array
     */
    private function getStates()
    {
        return array(
            'read' => Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\States\ReadInterface'),
        );
    }

    /**
     * @param string $name
     * @return mock
     */
    private function getMediator($name)
    {
        $mediators = $this->getMediators();
        return $mediators[$name];
    }

    /**
     * @return array
     */
    private function getMediators()
    {
        return array(
            'read' => Phake::mock('Concretehouse\Dp\Repository\Concretes\Pdo\Mediators\Read'),
        );
    }
}
