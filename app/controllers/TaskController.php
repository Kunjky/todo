<?php

namespace App\Controllers;

use App\Models\Task;

class TaskController
{
    private $model;

    /**
     * Contructor.
     */
    public function __construct()
    {
        $this->model = new Task;
    }

    /**
     * Show all tasks.
     */
    public function index()
    {
        $tasks = $this->model->all();

        return view('home', ['tasks' => $tasks]);
    }

    /**
     * Store a new task.
     */
    public function store()
    {
        $data = [
            'name' => $_POST['name'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status'],
        ];

        $this->model->insert($data);

        return redirect('');
    }

    /**
     * Update a task.
     */
    public function update()
    {
        $data = [
            'name' => $_POST['name'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status'],
        ];

        $this->model->updateById($data, $_POST['id']);

        return redirect('');
    }

    /**
     * Delete a task.
     */
    public function delete()
    {
        $this->model->delete($_POST['id']);

        return redirect('');
    }
}
