<?php

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private static $conn;

    private static function connection()
    {
        try {
            if (!self::$conn) {
                $dns = 'mysql:host=' . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'];
                self::$conn = new PDO($dns, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            }

            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return self::$conn;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public static function returnConnection()
    {
        return self::connection();
    }
}
