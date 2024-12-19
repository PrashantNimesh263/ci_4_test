<?php

namespace App\Controllers;

use App\Models\UserModel;

class UsersController extends BaseController
{
    // Show the registration form
    public function register()
    {
        return view('users/register');
    }

    // Store a new user in the database
    public function store()
    {
        // Form validation rules for registration
        $validation = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ]);

        // If validation fails, redirect back with errors
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $data = $this->request->getPost();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT); // Hash the password
        $model->save($data);
        return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
    }

    // Show the login form
    public function login()
    {
        return view('users/login');
    }

    // Handle user login
    // In UsersController.php (authenticate method)
public function authenticate()
{
    $model = new UserModel();
    $data = $this->request->getPost();

    // Check user credentials (example with email and password)
    $user = $model->where('email', $data['email'])->first();

    if ($user && password_verify($data['password'], $user['password'])) {
        // Set session with user details
        session()->set([
            'user_id' => $user['id'],
            'user_name' => $user['name'], // Store user name
            'is_logged_in' => true
        ]);

        return redirect()->to('/products');
    } else {
        session()->setFlashdata('error', 'Invalid credentials');
        return redirect()->to('/login');
    }
}


    // Handle user logout
    public function logout()
    {
        session()->destroy(); // Destroy the user session
        return redirect()->to('/login');
    }
}
