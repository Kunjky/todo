<?php

namespace App\Models;

use App\Core\App;

abstract class Model
{
    protected $database;

    public $table;

    /**
     * Construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->database = App::get('database');
    }

    /**
     * All
     *
     * @return mixed
     */
    public function all()
    {
        return $this->database->selectAll($this->table);
    }

    /**
     * Insert
     *
     * @param array $data data
     *
     * @return mixed
     */
    public function insert($data = [])
    {
        return $this->database->insert(
            $this->table,
            array_merge(
                $data,
                [
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            )
        );
    }

    /**
     * Delete
     *
     * @param int $id id
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->database->delete(
            $this->table,
            $id
        );
    }

    /**
     * Get by Id
     *
     * @param int $id id
     *
     * @return mixed
     */
    public function getById($id)
    {
        return $this->database->getById(
            $this->table,
            $id
        );
    }

    /**
     * Update by id
     *
     * @param array $data data
     * @param int   $id   id
     *
     * @return mixed
     */
    public function updateById($data, $id)
    {
        return $this->database->update(
            $this->table,
            array_merge(
                $data,
                [
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ),
            $id
        );
    }
}
