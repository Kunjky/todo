<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update
     *
     * @param string $table      table
     * @param array  $parameters parameters
     * @param array  $condition  condition
     *
     * @return void
     */
    public function update($table, $parameters, $id)
    {
        $fields = [];

        foreach ($parameters as $key => $value) {
            $temp = $key . "=:" . $key;
            array_push($fields, $temp);
        }

        $sql = sprintf(
            'update %s set %s where id=:id',
            $table,
            implode(',', $fields)
        );

        $parameters['id'] = $id;

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Delete
     *
     * @param string $table table
     * @param int    $id    id
     *
     * @return void
     */
    public function delete($table, $id)
    {
        try {
            $sql = sprintf(
                "delete from %s where id = %s",
                $table,
                $id
            );
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Get by id
     *
     * @param string $table table
     * @param int    $id    id
     *
     * @return void
     */
    public function getById($table, $id)
    {
        $sql = sprintf(
            "select * from %s where id = %s",
            $table,
            $id
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
