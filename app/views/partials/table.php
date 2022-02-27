<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Task</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $index => $task) : ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $task->name ?></td>
            <td><?= $task->start_date ?></td>
            <td><?= $task->end_date ?></td>
            <td>
                <?php if ($task->status == \App\Models\Task::STATUS_PLANNING): ?>
                    <span class="badge badge-primary">PLANNING</span>
                <?php elseif ($task->status == \App\Models\Task::STATUS_DOING): ?>
                    <span class="badge badge-secondary">DOING</span>
                <?php elseif ($task->status == \App\Models\Task::STATUS_COMPLETE): ?>
                    <span class="badge badge-success">COMPLETED</span>
                <?php endif; ?>
            </td>
            <td>
                <a class="btn btn-primary" href="/tasks/edit?id=<?= $task->id ?>">EDIT</a>|
                <form action="/tasks/delete" method="POST">
                    <input type="hidden" name="id" value="<?= $task->id ?>">
                    <button
                        class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this item?');">DELETE
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
