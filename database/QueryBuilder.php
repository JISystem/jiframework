<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 10/25/2018
 * Time: 11:17 AM
 */

namespace JI\Database;

use JI\database\Connection;
/**
 * Class QueryBuilder
 * @package JI\Database
 */
class QueryBuilder
{
    private static $query;
    private $table;
    public $response;
    public $errors;
    public static $connection;
    private static $builder;
    private static $statement;

    /**
     * @param $table
     * @return mixed
     */
    public static function all($table)
    {
        (new QueryBuilder)->connect();
        self::$query=sprintf('select * from %s', $table);
        self::execQuery();
        return self::$statement->fetchAll();
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public static function find($table, $id)
    {
        (new QueryBuilder)->connect();
        self::$query=sprintf('select * from %s where id=%s', $table, $id);
        self::execQuery();
        return self::$statement->fetch();
    }

    /**
     * @param string $table
     * @param array  $columns
     * @return mixed
     */
    public static function select($table, array $columns)
    {
        (new QueryBuilder)->connect();
        self::$query=sprintf(
            'select %s from %s',
            $table.".".implode(','.$table.".", $columns),
            $table
        );
        self::execQuery();
        return self::$statement->fetchAll();
    }

    /**
     * @param       $table
     * @param array $columns
     * @param array $conditions
     * @return mixed
     */
    public static function selectWhereEquals($table, array $columns, array $conditions)
    {
        $condition=null;
        foreach ($conditions as $datum => $value) {
            if ($condition == null) {
                $condition=$datum."='".$value."'";
            } else {
                $condition.=$datum."='".$value."'";
            }
        }
        (new QueryBuilder)->connect();
        self::$query=sprintf(
            'select %s from %s where %s',
            $table.".".implode(','.$table.".", $columns),
            $table,
            $condition
        );
        self::execQuery();
        return self::$statement->fetchAll();
    }

    /**
     * @return mixed
     */
    private static function execQuery()
    {
        try {
            self::$statement = self::$connection->prepare(self::$query); // prepare the query to prevent sql injection
            self::$statement->execute(); // execute the query
        } catch (\Throwable $exception) {
            die(var_dump($exception));
        }
        return self::$statement;
    }

    private function response()
    {
        return;
    }

    /**
     * @return \PDO
     */
    private function connect()
    {
        return self::$connection=Connection::establish();
    }
}
