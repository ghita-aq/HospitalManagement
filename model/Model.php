<?php
class Model
{

    private static $db;

    public static function getDB()
    {
        $user = "root";
        $password = "";
        $host = "localhost";
        $port = "3306";
        $dbname = "gestion_hopital";
        $dsn = "mysql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname;
        try {
            self::$db = new PDO($dsn, $user, $password);
            return self::$db;
        } catch (Exception $e) {
            echo "Erreur " . $e->getMessage();
            die();
        }
    }
    public static function executerRequete($sql, $params = [])
    {
        if (self::$db == null) {
            self::getDB();
        }
        $stm = self::$db->prepare($sql);
        $stm->execute($params);
        return $stm;
    }
}
