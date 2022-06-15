<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Middlewares\Auth;
use App\Models\Customer;

class AuthController extends Controller
{
    public function show(): string
    {
        return view('auth.login');
    }

    public function showRegister(): string
    {
        return view('auth.register');
    }


    public function register()
    {
        if ((!filter_var(request()->email, FILTER_VALIDATE_EMAIL)) || (request()->password != request()->password_confirmation)) {
            redirect()->back();
        }
        if (Customer::findOne(' email = ? ', [ request()->email ]) != null) {
            redirect()->back();
        }


        $customer = new Customer();
        $customer->email = request()->email;
        $customer->password = password_hash(request()->password, PASSWORD_DEFAULT);
        $customer->role = Customer::CUSTOMER_ROLE;
        $customer->save();

        redirect()->home();
    }

    public function createFakeAdmin()
    {
        if (Customer::findOne(' email = ? ', [ 'admin@example.com' ]) != null) {
            redirect()->home();
        }


        $admin = new Customer();
        $admin->email = 'admin@example.com';
        $admin->password = password_hash('admin', PASSWORD_DEFAULT);
        $admin->role = Customer::ADMIN_ROLE;
        $admin->save();
        redirect()->home();
    }

    public function login()
    {
        $user = Customer::findOne(' email = ? ', [ request()->email ]);
        if ($user == null) {
            redirect()->to('show_login');
        }

        if (!password_verify(request()->password, $user->password)) {
            redirect()->to('show_login');
        }
        Auth::user($user->role, $user);
        if ($user->role == Customer::ADMIN_ROLE)
        {
            redirect('/admin');
        }

        redirect('/dashboard');
    }
}