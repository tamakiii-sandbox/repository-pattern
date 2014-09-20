<?php

namespace Concretehouse\Dp\Repository\State;

/**
 * State handler interface.
 */
interface StateHandlerInterface
{
    /**
     * @param mixed $state
     * @return StateInterface
     */
    public function handle($state);
}
