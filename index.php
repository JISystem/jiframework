<?php
    /**
     * Created by PhpStorm.
     * User: itcyb
     * Date: 10/26/2018
     * Time: 6:47 PM
     */

//use DB;
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    use JI\Database\DB;

    require 'vendor/autoload.php';
    class_alias('JI\Database\QueryBuilder', 'JI\Database\DB');
//    var_dump(DB::selectWhereEquals('users', ['password', 'id'], ['id' => 1, 'id' => 2]));
    //var_dump(\JI\Database\QueryBuilder::all());

    return print_r(getallheaders());
