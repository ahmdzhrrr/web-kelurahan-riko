<?php

namespace App\Core;

use mysqli;

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $config = require BACKEND_PATH . '/config/config.php';

        $db = $config['database'];

        $this->connection = new mysqli(
            $db['host'],
            $db['user'],
            $db['pass'],
            $db['name']
        );

        if ($this->connection->connect_error) {
            throw new Exception(
                'Koneksi database gagal: ' .
                $this->connection->connect_error
            );
        }

        $this->connection->set_charset($db['charset']);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function connection()
    {
        return $this->connection;
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function prepare($sql)
    {
        return $this->connection->prepare($sql);
    }

    public function escape($string)
    {
        return $this->connection->real_escape_string($string);
    }

    public function lastInsertId()
    {
        return $this->connection->insert_id;
    }

    public function beginTransaction()
    {
        $this->connection->begin_transaction();
    }

    public function commit()
    {
        $this->connection->commit();
    }

    public function rollback()
    {
        $this->connection->rollback();
    }
}