<?php

namespace Concretehouse\Dp\Repository\Repository;

/**
 * Repository factory interface.
 */
interface FactoryInterface
{
    /**
     * @param string $name
     * @return Repositories\RepositoryInterface
     */
    public function create($name);

    /**
     * @param string $name
     * @param string $classname
     */
    public function register($name, $classname);

    /**
     * @param array $array
     */
    public function registers(array $array);
}
