<?php

namespace Concretehouse\Dp\Repository\Concretes\Pdo\Mediators;

use Concretehouse\Dp\Repository;
use Concretehouse\Dp\Repository\Concretes\Pdo\States;
use Concretehouse\Dp\Repository\Concretes\Pdo\Colleagues;

/**
 * Pdo read mediator.
 */
class Read implements Repository\Mediator\MediatorInterface
{
    /**
     * @param Colleagues $colleagues
     * @return mixed
     */
    public function mediate(Repository\Mediator\ColleaguesInterface $colleagues)
    {
        if (!$colleagues instanceof Colleagues) {
            throw new \InvalidArgumentException('$colleagues must be instance of Pdo Colleagues.');
        }

        // Prepare params
        $pdo = $colleagues->getPdo();
        $state = $colleagues->getState();

        // prepare
        $stmt = $pdo->prepare($state->getQuery(), $state->getOptions());

        // bindValue
        foreach ($state->getValues() as $parameter => $params) {
            $stmt->bindValue($parameter, $params[0], $params[1]);
        }

        // fetch
        if ($state instanceof States\Fetch) {
            return $this->fetch($stmt, $state);
        } elseif ($state instanceof States\FetchAll) {
            return $this->fetchAll($stmt, $state);
        } elseif ($state instanceof States\FetchColumn) {
            return $this->fetchColumn($stmt, $state);
        } elseif ($state instanceof States\FetchObject) {
            return $this->fetchObject($stmt, $state);
        }

        throw new \LogicException('Unknown fetch-type of PDOStatement.');
    }

    /**
     * @param \PDOStatement $stmt
     * @param States\Fetch $state
     * @return array|false
     */
    private function fetch(\PDOStatement $stmt, States\Fetch $state)
    {
        return $stmt->fetch(
            $state->getStyle(),
            $state->getOrientation(),
            $state->getOffset()
        );
    }

    /**
     * @param \PDOStatement
     * @param States\FetchAll $state
     * @return array
     */
    private function fetchAll(\PDOStatement $stmt, States\FetchAll $state)
    {
        return $stmt->fetchAll(
            $state->getStyle(),
            $state->getArgs(),
            $state->getCArgs()
        );
    }

    /**
     * @param \PDOStatement $stmt
     * @param States\FetchColumn $state
     * @return string
     */
    private function fetchColumn(\PDOStatement $stmt, States\FetchColumn $state)
    {
        return $stmt->fetchColumn(
            $state->getNumber()
        );
    }

    /**
     * @param \PDOStatement $stmt
     * @param States\FetchObject $state
     * @return mixed
     */
    private function fetchObject(\PDOStatement $stmt, States\FetchObject $state)
    {
        return $stmt->fetchObject(
            $state->getClass(),
            $state->getCArgs()
        );
    }
}
