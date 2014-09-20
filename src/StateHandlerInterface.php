<?php

namespace Concretehouse\Dp\Repository;

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
