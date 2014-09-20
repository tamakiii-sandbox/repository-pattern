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
     * @param StateInterface
     * @return ModelInterface
     */
    public function read(StateInterface $state);

    /**
     * @params StateInterface
     * @return Arrays\ArrayInterface
     */
    public function reads(StateInterface $state);

    /**
     * @param StateInterface
     * @return ResultInterface
     */
    public function update(StateInterface $state);

    /**
     * @param StateInterface
     * @return ResultInterface
     */
    public function updates(StateInterface $state);

    /**
     * @param StateInterface
     * @return ResultInterface
     */
    public function delete(StateInterface $state);

    /**
     * @param StateInterface
     * @return ResultInterface
     */
    public function deletes(StateInterface $state);
}
