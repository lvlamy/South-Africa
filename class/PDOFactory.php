<?php


class PDOFactory{
    public static function getMysqlConnexion()
    {
        $db = new PDO('mysql:host=localhost; dbname=southfrench; charset=utf8','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}