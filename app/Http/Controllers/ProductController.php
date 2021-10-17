<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Database\Query\Builder;

class ProductController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = DB::table('products')->get();
        $product = DB::table('products')->where('category', 'Beverages')->get();

        return view('products', ['product' => $product]);
    }

    public function productnames() {

    $all_product_names = DB::table('products')->pluck('product_name');
    return view('productnames', compact('all_product_names'));
    }


}
