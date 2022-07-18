<?php

class Db
{

    /**
     * Connecting to database.
     *
     * @return mixed
     */
    protected function connect()
    {
        try {
            include_once __DIR__ . '/../vendor/autoload.php';
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
            $dotenv->load();
            $db_host = $_ENV['DB_HOST'];
            $db_name = $_ENV['DB_NAME'];
            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];
            $db = new PDO("mysql:host=$db_host;dbname=$db_name", $username, $password);
            return $db;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}