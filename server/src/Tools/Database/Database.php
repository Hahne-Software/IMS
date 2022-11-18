<?php

namespace HahneSoftware\IMS\Server\Tools\Database;

class Database
{
    function getPdoConnection(): \PDO
    {
        // create pdo connection to postgresql database
        $pdo = new \PDO('pgsql:host=localhost;port=5432;dbname=ims', 'ims', 'ims');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}