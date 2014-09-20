<?php

namespace Concretehouse\Dp\Repository\Concretes;

use Concretehouse\Dp\Repository\StateInterface;

/**
 * Abstract class for states.
 */
abstract class StateAbstract implements StateInterface
{
    /**
     * @var array
     */
    private $conditions;


    /**
     * @param array $condition
     */
    public function __construct(array $conditions = array())
    {
        $this->conditions = array();
        $this->sets($conditions);
    }

    /**
     * @param string $name
     */
    public function all()
    {
        return $this->conditions;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get($name)
    {
        if (isset($this->conditions[$name])) {
            return $this->conditions[$name];
        }
    }

    /**
     * @param string $name
     * @param mixed $condition
     */
    public function set($name, $condition)
    {
        $this->conditions[$name] = $condition;
    }

    /**
     * @param array $conditions
     */
    public function sets(array $conditions)
    {
        foreach ($conditions as $name => $condition) {
            $this->set($name, $condition);
        }
    }
}
