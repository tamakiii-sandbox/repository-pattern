<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo;

use Concretehouse\Dp\Repository\Mediator as Upper;

/**
 * Colleagues interface for Pdo Mediator.
 */
interface ColleaguesInterface extends Upper\ColleaguesInterface
{
    /**
     * @param PdoInterface $pdo
     * @param StateInterface $state
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
