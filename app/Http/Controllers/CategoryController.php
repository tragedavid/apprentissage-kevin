<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list() {
        $categories = Category::orderBy('name')->get();
        return view('categories.list')
        ->withCategories($categories)
        ;
    }

    public function create() {
        return view('categories.create');
    }

    public function insert(CategoryRequest $request) {
        $data = $request->all();
        Category::create($data);

        return redirect(url('/categories'));
    }

    public function edit() {

    }

    public function update() {

    }

    public function delete($id) {
        Category::destroy($id);
        return redirect(url('/categories'));
    }
}
