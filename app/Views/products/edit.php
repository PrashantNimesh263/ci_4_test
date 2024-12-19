<?php echo view('templates/header'); ?>

<h1>Edit Product</h1>

<?php if(session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/products/update/<?= $product['id']; ?>" method="POST">
    <?= csrf_field(); ?> <!-- CSRF Protection -->
    <input type="hidden" name="_method" value="PUT"> <!-- Override method for PUT request -->
    
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" name="name" class="form-control" value="<?= old('name', $product['name']); ?>" required>
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required><?= old('description', $product['description']); ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" value="<?= old('price', $product['price']); ?>" required>
    </div>

    <button type="submit" class="btn btn-warning">Update</button>
</form>

<?php echo view('templates/footer'); ?>
