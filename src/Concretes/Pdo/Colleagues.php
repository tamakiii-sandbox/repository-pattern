<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo;

/**
 * Colleagues class for Pdo Mediator.
 */
class Colleagues implements ColleaguesInterface
{
    /**
     * @var PdoInterface
     */
    private $pdo;

    /**
     * @var StateInterface $state
     */
    private $state;


    /**
     * @param PdoInterface $pdo
     * @param StateInterface $state
     */
    public function __construct(PdoInterface $pdo, StateInterface $state)
    {
        $this->pdo = $pdo;
        $this->state = $state;
    }

    /**
     * @param PdoInterface $pdo
     */
    public function setPdo(PdoInterface $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return PdoInterface
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param StateInteface $state
     */
    public function setState(StateInterface $state)
    {
        $this->state = $state;
    }

    /**
     * @return StateInteface
     */
    public function getState()
    {
        return $this->state;
    }
}
