<?php require 'partials/head.php'; ?>
<h1 class="text-center">Todo list</h1>

<div class="row">
    <div class="col-3">
        <form action="/tasks/create" method="POST">
            <div class="form-group row">
                <label>Task Name</label>
                <input type="text" class="form-control" placeholder="Task name contain 6-255 characters" name="name">
            </div>
            <div class="form-group row">
                <label>Start Date</label>
                <input type="date" class="form-control" name="start_date" value="<?= date("Y-m-d") ?>">
            </div>
            <div class="form-group row">
                <label>End Date</label>
                <input type="date" class="form-control" name="end_date" value="<?= date("Y-m-d") ?>">
            </div>
            <div class="form-group row">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="<?= \App\Models\Task::STATUS_PLANNING ?>">PLANNING</option>
                    <option value="<?= \App\Models\Task::STATUS_DOING ?>">DOING</option>
                    <option value="<?= \App\Models\Task::STATUS_COMPLETE ?>">COMPLETED</option>
                </select>
            </div>
            <div class="form-group row">
                <button class="btn btn-primary">Add Task</button>
            </div>
        </form>

        <?php require 'partials/alert.php'; ?>
    </div>
    <div class="col-9">
        <?php require 'partials/table.php'; ?>
    </div>
</div>

<?php require 'partials/footer.php'; ?>
