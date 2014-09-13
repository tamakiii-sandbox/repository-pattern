<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo\States;

/**
 * Pdo mediating state for Statement::fetchAll().
 * @link http://php.net/manual/ja/pdostatement.fetchall.php
 */
class FetchAll extends ReadAbstract
{
    /**
     * @var int
     */
    private $style;

    /**
     * @var mixed
     */
    private $args;

    /**
     * @var array
     */
    private $cArgs;


    /**
     * @param string $query
     * @param array $values
     * @param int $style
     * @param mixed $args
     * @param array $cArgs
     */
    public function __construct(
        $query,
        array $values = array(),
        $style = \PDO::FETCH_BOTH,
        $args = null,
        array $cArgs = array()
    ) {
        parent::__construct($query, $values);

        $this->style = $style;
        $this->args = $args;
        $this->cArgs = $cArgs;
    }

    /**
     * @param int $style
     */
    public function setStyle($style)
    {
        $this->style = $style;
    }

    /**
     * @return int
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param int $args
     */
    public function setArgs($args)
    {
        $this->args = $args;
    }

    /**
     * @return int
     */
    public function getArgs()
    {
        return $this->args;
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
