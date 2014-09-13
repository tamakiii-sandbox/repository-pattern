<?php

namespace Concretehouse\Dp\Repository\State;

/**
 * State factory interface.
 */
interface FactoryInterface
{
    /**
     * @param string $name
     * @return StateInterface
     */
    public function create($name);

    /**
     * @param string $name
     * @param string $classname
     */
    public function register($name, $classname);
}
