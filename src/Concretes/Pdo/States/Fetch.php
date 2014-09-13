<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo\States;

use Concretehouse\Dp\Repository\Concretes\Pdo\StateAbstract;

/**
 * Pdo mediating state for Statement::fetch().
 * @link http://php.net/manual/ja/pdostatement.fetch.php
 */
class Fetch extends StateAbstract
{
    /**
     * @var int
     */
    private $style;

    /**
     * @var int
     */
    private $orientation;

    /**
     * @var int
     */
    private $offset;


    /**
     * @param string $query
     * @param array $values
     * @param int $style
     * @param int $orientation
     * @param int $offset
     */
    public function __construct(
        $query,
        array $values = array(),
        $style = \PDO::FETCH_BOTH,
        $orientation = \PDO::FETCH_ORI_NEXT,
        $offset = 0
    ) {
        parent::__construct($query, $values);

        $this->style = $style;
        $this->orientation = $orientation;
        $this->offset = $offset;
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
     * @param int $orientation
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }

    /**
     * @return int
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }
}
