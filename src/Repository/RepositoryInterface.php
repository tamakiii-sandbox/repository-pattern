<?php

namespace Concretehouse\Dp\Repository\Repository;

use Concretehouse\Dp\Repository\Model;
use Concretehouse\Dp\Repository\Order;

/**
 * Repository interface.
 */
interface RepositoryInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param array $row
     * @return Model\ModelInterface
     */
    public function instantiate(array $row);

    /**
     * @param array $rows
     * @return array
     */
    public function instantiates(array $rows);

    /**
     * @param Model\ModelInterface
     * @return Model\ModelInterface
     */
    public function create(Model\ModelInterface $model);

    /**
     * @param Order\OrderInterface
     * @return Model\ModelInterface
     */
    public function read(Order\OrderInterface $order);

    /**
     * @params Order\OrderInterface
     * @return Arrays\ArrayInterface
     */
    public function reads(Order\OrderInterface $order);

    /**
     * @param Order\OrderInterface
     * @return ResultInterface
     */
    public function update(Order\OrderInterface $order);

    /**
     * @param Order\OrderInterface
     * @return ResultInterface
     */
    public function updates(Order\OrderInterface $order);

    /**
     * @param Order\OrderInterface
     * @return ResultInterface
     */
    public function delete(Order\OrderInterface $order);

    /**
     * @param Order\OrderInterface
     * @return ResultInterface
     */
    public function deletes(Order\OrderInterface $order);
}
