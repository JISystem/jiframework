<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 10/27/2018
 * Time: 12:09 PM
 */

namespace JI\config;

/**
 * Class IniLoader
 * @package JI\config
 */
class IniLoader
{
    private static $path;
    private static $file='config.ini';

    /**
     *
     */
    private static function readIni()
    {
        $ini = "[database]
            database_name   =   habexagro
            database_user   =   root
            database_pass   =   
            database_port   =   3306
            database_host   =   localhost           
        ";
        //locate and find ini configuration file
//        return parse_ini_file(self::$path.self::$file, true);
        return parse_ini_string($ini, true);
    }

    /**
     * @return array|bool
     */
    public static function load()
    {
        return self::readIni();
    }
}
