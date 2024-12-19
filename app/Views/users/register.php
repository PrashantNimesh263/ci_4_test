<?php echo view('templates/header'); ?>

<h1>Register</h1>

<?php if(session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/users/store" method="POST">
    <?= csrf_field(); ?> <!-- CSRF Protection -->

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="<?= old('name'); ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?= old('email'); ?>" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Register</button>
</form>

<?php echo view('templates/footer'); ?>
