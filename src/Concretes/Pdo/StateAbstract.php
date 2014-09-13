<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo;

/**
 * Abstract class of States for Pdo.
 */
abstract class StateAbstract implements StateInterface
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var array
     */
    private $values = array();

    /**
     * @var array
     */
    private $options = array();


    /**
     * @param string $query
     * @param array $values
     */
    public function __construct($query, array $values = array())
    {
        $this->query = $query;
        $this->addValues($values);
    }

    /**
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        if (empty($this->query)) {
            throw new \UnexpectedValueException('No query set.');
        }
        return $this->query;
    }

    /**
     * @param array $values
     */
    public function addValues($values)
    {
        foreach ($values as $parameter => $params) {
            if (!is_array($params)) {
                $this->addValue($parameter, $params);
            } elseif (is_array($params)) {
                if (isset($params[0]) && isset($params[1])) {
                    $this->addValue($parameter, $params[0], $params[1]);
                } elseif (isset($params[0])) {
                    $this->addValue($parameter, $params[0]);
                } else {
                    throw new \InvalidArgumentException('Invalid params specified.');
                }
            }
        }
    }

    /**
     * @param string $parameter
     * @param mixed $value
     * @param int $dataType
     */
    public function addValue($parameter, $value, $dataType = \PDO::PARAM_STR)
    {
        $this->values[$parameter] = array($value, $dataType);
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param int $fetchStyle
     */
    public function setFetchStyle($fetchStyle)
    {
        $this->fetchStyle = $fetchStyle;
    }

    /**
     * @return int
     */
    public function getFetchStyle()
    {
        return $this->fetchStyle;
    }

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return int
     */
    public function getOptions()
    {
        return $this->options;
    }
}
