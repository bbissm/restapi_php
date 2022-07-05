<?php
namespace src\System;

class DatabaseConnector {

    private $dbConnection = null;

    public function __construct()
    {
        $con_data = [
            'host' => getenv('DB_HOST'),
            'port' => getenv('DB_PORT'),
            'db'   => getenv('DB_DATABASE'),
            'user' => getenv('DB_USERNAME'),
        ];


        try {

            $this->dbConnection = new \PDO(
                "mysql:host=".$con_data['host'].";port=".$con_data['port'].";charset=utf8mb4;dbname=".$con_data['db'].";",
                $con_data['user']
            );
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }

    }

    public function getConnection()
    {
        return $this->dbConnection;
    }
}
