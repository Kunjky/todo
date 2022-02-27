<?php if (isset($_SESSION['errors'])): ?>
<div class="alert alert-danger" role="alert">
    <?php foreach ($_SESSION['errors'] as $message) : ?>
    <ul>
        <li>
            <?= $message ?>
        </li>
    </ul>
    <?php endforeach; ?>
</div>
<?php unset($_SESSION['errors']) ?>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
<div class="alert alert-success" role="alert">
    <?= $_SESSION['success'] ?>
</div>
<?php unset($_SESSION['success']) ?>
<?php endif; ?>
