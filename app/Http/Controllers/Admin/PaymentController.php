<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        return view('admin.payment.add');
    }

    public function payment_manage(){
        return view('admin.payment.manage');
    }

}
