<?php

namespace Concretehouse\Dp\Repository\Repository;

use Concretehouse\Dp\Repository\Model;
use Concretehouse\Dp\Repository\State;

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
     * @param State\StateInterface
     * @return Model\ModelInterface
     */
    public function read(State\StateInterface $State);

    /**
     * @params State\StateInterface
     * @return Arrays\ArrayInterface
     */
    public function reads(State\StateInterface $State);

    /**
     * @param State\StateInterface
     * @return ResultInterface
     */
    public function update(State\StateInterface $State);

    /**
     * @param State\StateInterface
     * @return ResultInterface
     */
    public function updates(State\StateInterface $State);

    /**
     * @param State\StateInterface
     * @return ResultInterface
     */
    public function delete(State\StateInterface $State);

    /**
     * @param State\StateInterface
     * @return ResultInterface
     */
    public function deletes(State\StateInterface $State);
}
