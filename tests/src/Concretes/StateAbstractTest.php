<?php

namespace Concretehouse\Dp\Repository\Test\Concretes;

use Phake;

/**
 * Test for state abstract.
 */
class StateAbstractTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->state = Phake::partialMock('Concretehouse\Dp\Repository\Concretes\StateAbstract', array(
            'where' => array('id' => 1234),
            'order' => 'created',
        ));
    }

    /**
     * @test
     */
    public function implementsStateInterface()
    {
        $this->assertInstanceOf('Concretehouse\Dp\Repository\StateInterface', $this->state);
    }

    /**
     * @test
     */
    public function canSetConditionsWithCtor()
    {
        $this->assertSame(array('id' => 1234), $this->state->get('where'));
        $this->assertSame('created', $this->state->get('order'));
    }

    /**
     * @test
     */
    public function canSetConditionsWithSetMethod()
    {
        $this->state->set('group', 'team');
        $this->assertSame('team', $this->state->get('group'));
    }

    /**
     * @test
     */
    public function canSetConditionsWithSetsMethod()
    {
        $this->state->sets(array(
            'group' => 'team',
            'columns' => '*',
        ));
        $this->assertSame('team', $this->state->get('group'));
        $this->assertSame('*', $this->state->get('columns'));
    }

    /**
     * @test
     */
    public function canGetConditionsWithAll()
    {
        $this->state->set('group', 'team');
        $this->assertSame(
            array(
                'where' => array('id' => 1234),
                'order' => 'created',
                'group' => 'team',
            ),
            $this->state->all()
        );
    }
}
