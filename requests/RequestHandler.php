<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 10/25/2018
 * Time: 11:20 AM
 */

namespace JI\requests;

/**
 * Class RequestHandler
 * @package JI\requests
 */
class RequestHandler
{
    /**
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return string
     */
    public static function u0ri()
    {
        $uri=trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );
        return $uri;
    }
}