<?php echo view('templates/header'); ?>

<h1>Products List</h1>

<!-- Flash Message for Success -->
<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif; ?>

<!-- Add Product Button -->
<div class="mb-3">
    <a href="/products/create" class="btn btn-success">Add Product</a>
</div>

<!-- Products Table -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product): ?>
            <tr>
                <td><?= $product['id']; ?></td>
                <td><?= $product['name']; ?></td>
                <td><?= $product['description']; ?></td>
                <td><?= $product['price']; ?></td>
                <td>
                    <a href="/products/edit/<?= $product['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="/products/delete/<?= $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Pagination Links -->
<?= $pager->links(); ?>

<?php echo view('templates/footer'); ?>
