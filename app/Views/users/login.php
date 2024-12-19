<?php echo view('templates/header'); ?>

<h1>Login</h1>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
<?php endif; ?>

<form action="/users/authenticate" method="POST">
    <?= csrf_field(); ?> <!-- CSRF Protection -->

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?= old('email'); ?>" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

<?php echo view('templates/footer'); ?>
