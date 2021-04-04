<?php

/**
 * 
 * Class Db get connection to Database
 */
class Db {

    /**
     * Connection to Database
     * @return PDO object
     */
    public static function getConnection() {

        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $db->exec("set names utf8");

        return $db;
    }

}
