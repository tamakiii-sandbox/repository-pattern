<?php

namespace Concretehouse\Dp\Repository\Order;

/**
 * Order factory interface.
 */
interface FactoryInterface
{
    /**
     * @param string $name
     * @return OrderInterface
     */
    public function create($name);

    /**
     * @param string $name
     * @param string $classname
     */
    public function register($name, $classname);
}
