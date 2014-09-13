<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo;

use Concretehouse\Dp\Repository\Mediator\MediatorInterface;
use Concretehouse\Dp\Repository\Mediator\ColleaguesInterface;

/**
 * Pdo mediator.
 */
class Mediator implements MediatorInterface
{
    /**
     * @param Colleagues $colleagues
     * @return mixed
     */
    public function mediate(ColleaguesInterface $colleagues)
    {
        $state = $colleagues->getState();
        $mediator = $this->getMediator($state);
        return $mediator->mediate($colleagues);
    }

    /**
     * @param State $state
     * @return MediatorInterface
     */
    private function getMediator(State $state)
    {
        $state = $colleagues->getState();

        if ($state instanceof States\ReadInterface) {
            return $this->read($colleagues);
        }

        throw new \InvalidArgumentException('Colleagues specifies unknown state.');
    }
}
