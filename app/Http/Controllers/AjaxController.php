<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function categoryChilds($id) {
        $childCategories = Category::where('id_category', $id)->get();
        // $childCategories = "Superbes catégories enfants";
	    return $childCategories;
    }
}
