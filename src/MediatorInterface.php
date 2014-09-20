<?php

namespace Concretehouse\Dp\Repository;

/**
 * State mediator interface.
 */
interface MediatorInterface
{
    /**
     * @param MediatorColleaguesInterface
     */
    public function mediate(MediatorColleaguesInterface $colleagues);
}
