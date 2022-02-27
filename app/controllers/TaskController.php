<?php

namespace App\Controllers;

use App\Models\Task;
use App\Core\App;

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
        $errors = $this->checkValidation();

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            return redirect('');
        }

        $data = [
            'name' => $_POST['name'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status'],
        ];

        $this->model->insert($data);
        $_SESSION['success'] = 'Create successfully';

        return redirect('');
    }

    /**
     * Update a task.
     */
    public function update()
    {
        $errors = $this->checkValidation();

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            return redirect('tasks/edit?id=' . $_POST['id']);
        }

        $data = [
            'name' => $_POST['name'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status'],
        ];

        $this->model->updateById($data, $_POST['id']);
        $_SESSION['success'] = 'Update successfully';

        return redirect('');
    }

    /**
     * Delete a task.
     */
    public function edit()
    {
        $task = $this->model->getById($_GET['id'])[0];

        return view('edit', ['task' => $task]);
    }

    /**
     * Delete a task.
     */
    public function delete()
    {
        $this->model->delete($_POST['id']);

        $_SESSION['success'] = 'Delete successfully';

        return redirect('');
    }

    /**
     * Check validation.
     */
    public function checkValidation()
    {
        $regex = App::get('define')['regex'];

        // regex validation
        $errors = validate([
            'name' => $regex['name'],
            'start_date' => $regex['date'],
            'end_date' => $regex['date'],
            'status' => $regex['task_status'],
        ]);

        // custom validation
        if ($_POST['start_date'] > $_POST['end_date']) {
            $errors['end_date'] = 'end_date must be after start_date';
        }

        return $errors;
    }
}
