<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.manage_product_preview');
    }

    public function manage(){
        return view('admin.product.manage');
    }
}
