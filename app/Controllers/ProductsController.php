<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductsController extends BaseController
{
    // Display the paginated product list
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->paginate(10); // Pagination for product list
        $data['pager'] = $model->pager;

        return view('products/index', $data); // Load product list view
    }

    // Show the form to create a new product
    public function create()
    {
        return view('products/create');
    }

    // Store a new product in the database
    public function store()
    {
        // Form validation rules
        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        // If validation fails, redirect back with errors
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new ProductModel();
        $model->save($this->request->getPost()); // Save validated product data
        return redirect()->to('/products')->with('success', 'Product created successfully!');
    }

    // Show the form to edit a product
    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);

        if (!$data['product']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found.'); // Error handling
        }

        return view('products/edit', $data);
    }

    // Update product details in the database
    public function update($id)
    {
        // Form validation rules
        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        // If validation fails, redirect back with errors
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new ProductModel();
        $model->update($id, $this->request->getPost()); // Update validated product data
        return redirect()->to('/products')->with('success', 'Product updated successfully!');
    }

    // Delete a product
    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id); // Delete product by ID
        return redirect()->to('/products')->with('success', 'Product deleted successfully!');
    }
}
