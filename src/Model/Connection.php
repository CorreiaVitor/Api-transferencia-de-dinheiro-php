<?php
namespace Api\Model;
use PDO;

define("HOST", "127.0.0.1");
define("USER", "root");
define("DB", "db_bank");
define("PASS", null);

class Connection
{

    private static $conn;

    private static function dbConnect() : object
    {
        try {
            if(self::$conn === null){
                $dns = "mysql:host=" . HOST . ";dbname=" . DB;
                self::$conn = new PDO($dns, USER, PASS);
            }

            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        } catch (\Exception $ex) {
           echo $ex->getMessage();
        }    
    }

    public static function returnsConnection() : object
    {
        return self::dbConnect();
    }

}


