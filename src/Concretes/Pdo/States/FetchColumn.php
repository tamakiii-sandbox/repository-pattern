<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo\States;

/**
 * Pdo mediating state for Statement::fetchColumn().
 * @link http://php.net/manual/ja/pdostatement.fetchcolumn.php
 */
class FetchColumn extends ReadAbstract
{
    /**
     * @var int
     */
    private $number;


    /**
     * @param string $query
     * @param array $values
     * @param int $number
     */
    public function __construct(
        $query,
        array $values = array(),
        $number = 0
    ) {
        parent::__construct($query, $values);

        $this->number = $number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }
}
