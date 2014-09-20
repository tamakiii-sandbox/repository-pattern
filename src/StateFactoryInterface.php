<?php

namespace Concretehouse\Dp\Repository;

/**
 * State factory interface.
 */
interface StateFactoryInterface
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
