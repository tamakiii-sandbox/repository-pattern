<?php

namespace Concretehouse\Dp\Repository\Mediator;

use Concretehouse\Dp\Repository\Order\OrderInterface;

/**
 * Order mediator interface.
 */
interface MediatorInterface
{
    /**
     * @param OrderInterface $order
     * @param MediatableInterface $object
     */
    public function mediate(OrderInterface $order, MediatableInterface $object);
}
