<?php

namespace Concretehouse\Dp\Repository\Mediator;

/**
 * State mediator interface.
 */
interface MediatorInterface
{
    /**
     * @param ColleaguesInterface
     */
    public function mediate(ColleaguesInterface $colleagues);
}
