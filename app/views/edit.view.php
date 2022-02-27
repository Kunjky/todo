<?php require 'partials/head.php'; ?>
<h1>Edit Task</h1>

<div class="row">
    <div class="col-4">
        <form action="/tasks/update" method="POST">
            <div class="form-group row">
                <label>Task</label>
                <input type="text" class="form-control" placeholder="Task" name="name" value="<?= $task->name ?>">
            </div>
            <div class="form-group row">
                <label>Start Date</label>
                <input type="date" class="form-control" name="start_date" value="<?= $task->start_date ?>">
            </div>
            <div class="form-group row">
                <label>End Date</label>
                <input type="date" class="form-control" name="end_date" value="<?= $task->end_date ?>">
            </div>
            <div class="form-group row">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="0" <?= $task->status == 0 ? 'selected' : '' ?>>PLANNING</option>
                    <option value="1" <?= $task->status == 1 ? 'selected' : '' ?>>DOING</option>
                    <option value="2" <?= $task->status == 2 ? 'selected' : '' ?>>COMPLETED</option>
                </select>
            </div>
            <div class="form-group row">
                <button class="btn btn-primary">Update</button>
            </div>
            <input type="hidden" name="id" value="<?= $task->id ?>">
        </form>

        <?php require 'partials/alert.php'; ?>
    </div>
</div>

<?php require 'partials/footer.php'; ?>
