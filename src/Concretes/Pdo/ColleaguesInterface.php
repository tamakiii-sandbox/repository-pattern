<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo;

use Concretehouse\Dp\Repository\Mediator;

/**
 * Colleagues interface for Pdo Mediator.
 */
interface ColleaguesInterface extends Mediator\ColleaguesInterface
{
    /**
     * @param Pdo $pdo
     * @param State $state
     */
    public function __construct(PdoInterface $pdo, StateInterface $state);

    /**
     * @param PdoInterface $pdo
     */
    public function setPdo(PdoInterface $pdo);

    /**
     * @return PdoInterface
     */
    public function getPdo();

    /**
     * @param StateInteface $state
     */
    public function setState(StateInterface $state);

    /**
     * @return StateInteface
     */
    public function getState();
}
