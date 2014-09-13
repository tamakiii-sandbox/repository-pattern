<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo\States;

use Concretehouse\Dp\Repository\Concretes\Pdo\StateAbstract;

/**
 * Pdo mediating state for Statement::fetchObject().
 * @link http://php.net/manual/ja/pdostatement.fetchobject.php
 */
class FetchObject extends StateAbstract
{
    /**
     * @var string
     */
    private $class;

    /**
     * @var array
     */
    private $cArgs;


    /**
     * @param string $query
     * @param array $values
     * @param string $class
     * @param array $cArgs
     */
    public function __construct(
        $query,
        array $values = array(),
        $class = 'stdClass',
        array $cArgs
    ) {
        parent::__construct($query, $values);

        $this->class = $class;
        $this->cArgs = $cArgs;
    }

    /**
     * @param string $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param array $cArgs
     */
    public function setCArgs($cArgs)
    {
        $this->cArgs = $cArgs;
    }

    /**
     * @return array
     */
    public function getCArgs()
    {
        return $this->cArgs;
    }
}
