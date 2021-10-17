<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Order;

class OrderController extends Controller
{
   public function index () {
       $order = DB::table('orders')->get();
       return view('orders', compact('order'));
   }
}
