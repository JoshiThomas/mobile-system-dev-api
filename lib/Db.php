<?php

/**
 * Created by PhpStorm.
 * User: Joshi Thomas
 * Date: 15/10/2020
 */
class Db
{
    /**
     * @return PDO
     *
     * This is the main database connection
     */
    public function getDbConnection()
    {
        $strConn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", _DB_SERVER_, _DB_NAME_);
        $dbConn  = new PDO($strConn, _DB_USER_, _DB_PASSWD_);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line for error mode enabling
        return $dbConn;
    }

}