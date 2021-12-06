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
        $categories = Category::where("id_category", null)->orderBy('name')->get();
        return view('categories.create')
        ->withCategories($categories)
        ;
    }

    public function insert(CategoryRequest $request) {
        $data = $request->all();
        if ($data['id_category'] == "None") {
            $data['id_category'] = null;
        }
        Category::create($data);

        return redirect(url('/categories'));
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('categories.edit')
        ->withCategory($category)
        ;
    }

    public function update($id, CategoryRequest $request) {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        return redirect(url('/category/edit/'.$category->id));
    }

    public function delete($id) {
        Category::destroy($id);
        return redirect(url('/categories'));
    }
}
