<?php

namespace Concretehouse\Dp\Repository\Test\Concretes\Pdo;

use Concretehouse\Dp\Repository\Concretes\Pdo\Pdo;
use Phake;

class PdoExt extends Pdo
{
    public function __construct($dsn, $username, $password, array $options = array())
    {
        // no parent constructor call
    }
}

/**
 * Test for pdo.
 */
class PdoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        $this->pdo = new PdoExt('mysql:dbname...', 'user', 'pass');
    }

    /**
     * @test
     */
    public function extendsDefaultPdoClass()
    {
        $this->assertInstanceOf('\PDO', $this->pdo);
    }

    /**
     * @test
     */
    public function implementsPdoInterface()
    {
        $this->assertInstanceOf('Concretehouse\Dp\Repository\Concretes\Pdo\PdoInterface', $this->pdo);
    }
}
