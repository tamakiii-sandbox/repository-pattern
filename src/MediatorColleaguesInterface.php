<?php

namespace Concretehouse\Dp\Repository;

/**
 * Mediator colleagues interface.
 */
interface MediatorColleaguesInterface
{
    /**
     * @return PdoInterface
     */
    public function getPdo();

    /**
     * @return StateInteface
     */
    public function getState();
}
