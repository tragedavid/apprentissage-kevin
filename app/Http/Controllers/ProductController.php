<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function list() {
        $products = Product::orderBy('name')->get();
        return view('products.list')
        ->withProducts($products)
        ;
    }

    public function create() {
        $test = "deazrgy";
        return view('products.create')
        ->withTest($test)
        ;
    }

    public function edit() {

    }

    public function insert(ProductRequest $request) {
        $data = $request->all();
        Product::create($data);
        return redirect(url('/product/create'));
    }

    public function delete($id) {
        Product::destroy($id);
        return redirect(url('/products'));
    }
}

