<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 10/25/2018
 * Time: 11:19 AM
 */

namespace JI\database;

use JI\config\ConfigLoader;

/**
 * Class GetConfig
 * @property  rawConfig
 * @package JI\database
 */
class GetConfig
{

    public static $rawConfig;
    public static $host;
    public static $port;
    public static $database;
    public static $username;
    public static $password;

    /**
     * @return mixed
     */
    public static function getConfiguration()
    {
        return ConfigLoader::database();
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        switch ($name) {
            case ('database') : {
                return self::getConfiguration()['database_name'];
                break;
            }
            case "host": {
                return self::getConfiguration()['database_host'];
                break;
            }
            case 'port': {
                return self::getConfiguration()['database_port'];
                break;
            }
            case 'password': {
                return self::getConfiguration()['database_pass'];
                break;
            }
            case 'username' : {
                return self::getConfiguration()['database_user'];
                break;
            }
            default : {
                break;
            }
        }
    }
}
