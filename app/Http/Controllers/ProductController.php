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

    public function insert(ProductRequest $request) {
            $data = $request->all();
            Product::create($data);
            return redirect(url('/product/create'));
    }

    public function create() {
        return view('products.create');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('products.edit')
        ->withProduct($product)
        ;
    }

    public function update($id, ProductRequest $request) {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();
        return redirect(url('/products'));
    }

    public function delete($id) {
        Product::destroy($id);
        return redirect(url('/products'));
    }
}

