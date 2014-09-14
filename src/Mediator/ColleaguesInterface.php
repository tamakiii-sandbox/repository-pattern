<?php

namespace Concretehouse\Dp\Repository\Mediator;

/**
 * Mediator colleagues interface.
 */
interface ColleaguesInterface
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
