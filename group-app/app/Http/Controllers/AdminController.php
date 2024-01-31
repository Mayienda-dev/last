<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    
    public function index()

    {   
        
        return view('admin.home');
    }

    public function getUsers()
    {
        $users = User::all();

         dd($users);
       

        return view('admin.users');
    }
    public function getProducts()
    {
        $products = Product::all();

        dd($products);

        return view('admin.products');
    }
   
}
