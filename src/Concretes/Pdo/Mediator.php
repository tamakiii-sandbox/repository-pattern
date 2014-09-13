<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo;

use Concretehouse\Dp\Repository\Mediator as Upper;
use Concretehouse\Dp\Factory\FactoryInterface;

/**
 * Pdo mediator.
 */
class Mediator implements Upper\MediatorInterface
{
    /**
     * @var FactoryInterface
     */
    private $factory;


    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param Upper\ColleaguesInterface $colleagues
     * @return mixed
     */
    public function mediate(Upper\ColleaguesInterface $colleagues)
    {
        $state = $colleagues->getState();
        $mediator = $this->getMediator($state);
        return $mediator->mediate($colleagues);
    }

    /**
     * @param StateInterface $state
     * @return MediatorInterface
     */
    private function getMediator(StateInterface $state)
    {
        if ($state instanceof States\ReadInterface) {
            return $this->create('read');
        }

        throw new \InvalidArgumentException('Colleagues specifies unknown state.');
    }

    /**
     * @param string $name
     * @return MediatorInterface
     */
    private function create($name)
    {
        $mediator = $this->factory->create($name);

        if (!$mediator instanceof Upper\MediatorInterface) {
            $class = get_class($mediator);
            throw new \UnexpectedValueException("Mediator must implement MediatorInterface({$class}).");
        }

        return $mediator;
    }
}
