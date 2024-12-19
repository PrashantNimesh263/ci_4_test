<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class ProductsController extends ResourceController
{
    protected $modelName = 'App\Models\ProductModel';
    protected $format = 'json';

    // Fetch all products
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // Fetch a product by ID
    public function show($id = null)
    {
        $product = $this->model->find($id);
        return $product ? $this->respond($product) : $this->failNotFound('Product not found.');
    }

    // Create a new product
    public function create()
    {
        $data = $this->request->getPost();
        $this->model->save($data);
        return $this->respondCreated($data);
    }

    // Update a product by ID
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $this->model->update($id, $data);
        return $this->respond($data);
    }

    // Delete a product by ID
    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['id' => $id]);
    }
}
