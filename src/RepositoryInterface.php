<?php

namespace Concretehouse\Dp\Repository;

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
     * @return ModelInterface
     */
    public function instantiate(array $row);

    /**
     * @param array $rows
     * @return array
     */
    public function instantiates(array $rows);

    /**
     * @param ModelInterface
     * @return ModelInterface
     */
    public function create(ModelInterface $model);

    /**
     * @param State\StateInterface
     * @return ModelInterface
     */
    public function read(State\StateInterface $state);

    /**
     * @params State\StateInterface
     * @return Arrays\ArrayInterface
     */
    public function reads(State\StateInterface $state);

    /**
     * @param State\StateInterface
     * @return ResultInterface
     */
    public function update(State\StateInterface $state);

    /**
     * @param State\StateInterface
     * @return ResultInterface
     */
    public function updates(State\StateInterface $state);

    /**
     * @param State\StateInterface
     * @return ResultInterface
     */
    public function delete(State\StateInterface $state);

    /**
     * @param State\StateInterface
     * @return ResultInterface
     */
    public function deletes(State\StateInterface $state);
}
