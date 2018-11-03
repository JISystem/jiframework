<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 10/25/2018
 * Time: 11:30 AM
 */

namespace JI\config;

/**
 * Class ConfigLoader
 * @package JI\config
 */
class ConfigLoader
{
    /**
     * @return mixed
     */
    public static function database()
    {
        return IniLoader::load()['database'];
    }
}