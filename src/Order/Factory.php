<?php

namespace Concretehouse\DesignPattern\Repository\Order;

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
