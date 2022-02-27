<?php if (isset($_SESSION['errors'])): ?>
    <?php foreach ($_SESSION['errors'] as $message) : ?>
    <ul>
        <li>
            <?= $message ?>
        </li> 
    </ul>
    <?php endforeach; ?>
    <?php unset($_SESSION['errors']) ?>
<?php endif; ?>