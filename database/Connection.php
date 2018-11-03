<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 10/25/2018
 * Time: 11:17 AM
 */

namespace JI\database;

use PDO;

/**
 * Class Connection
 * @package JI\database
 */
class Connection extends GetConfig
{
    private static $pdo;
    /**
     * @return PDO
     */
    public static function establish()
    {
        try {
            # Create a new PDO object and use it to connect to the database
            self::$pdo= new PDO(
                "mysql:host=" . self::host() . ":".self::port().";
                dbname=" . self::database(), // database name
                self::username(), // database username
                self::password(),
                $options = [
                    PDO::ATTR_EMULATE_PREPARES => true, // turn on emulation mode for "real" prepared statements
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,PDO::FETCH_ASSOC //make the default fetch
                ] # database options you need | optional
            );
        } catch (\PDOException $exception) {
            // If any error, grab the message and code and handle it accordingly
            die(var_dump($exception->getCode(), $exception->getMessage()));
        }
        return self::$pdo;
    }
}
