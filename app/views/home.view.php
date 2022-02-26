<?php require 'partials/head.php'; ?>

    <h1>Home Page</h1>

    <?php foreach ($tasks as $task) : ?>
        <ul>
            <?php echo "<li>" . $task->name . "</li>"?>
        </ul>
    <?php endforeach; ?>

    <form action="/tasks/create" method="POST">
        <input type="text" name="name">
        <select name="status" id="">
            <option value="0">Planning</option>
            <option value="1">Doing</option>
            <option value="2">Complete</option>
        </select>
        <input type="date" name="start_date">
        <input type="date" name="end_date">
        <button>POST</button>
    </form>

<?php require 'partials/footer.php'; ?>
