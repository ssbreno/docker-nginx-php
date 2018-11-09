<?php


class db{

    function getDB() {
        $dbtype="pgsql";
        $dbhost="127.0.0.1";
        $dbport="8080";
        $dbuser="";
        $dbpass="";
        $dbname="";
        $dbConnection = new PDO("$dbtype:host=$dbhost port=$dbport;dbname=$dbname", $dbuser, $dbpass);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }


}
