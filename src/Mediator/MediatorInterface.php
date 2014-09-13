<?php

namespace Concretehouse\Dp\Repository\Mediator;

use Concretehouse\Dp\Repository\State\StateInterface;

/**
 * State mediator interface.
 */
interface MediatorInterface
{
    /**
     * @param StateInterface $State
     * @param MediatableInterface $object
     */
    public function mediate(StateInterface $State, MediatableInterface $object);
}
