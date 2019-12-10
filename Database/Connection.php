<?php


class Connection
{
    public static function make ($config)
    {

        try{
            $pdo = new PDO("mysql:dbname={$config['dbname']};host={$config['host']};charset={$config['charset']}",
                "{$config['username']}", "{$config['password']}", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $pdo;
        }catch (\PDOException $e)
        {
            echo ' Error connection' .' '. $e->getMessage();
        }

    }
}