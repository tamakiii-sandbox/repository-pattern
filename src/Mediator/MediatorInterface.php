<?php

namespace Concretehouse\Dp\Repository\Mediator;

use Concretehouse\Dp\Repository\State\StateInterface;

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
