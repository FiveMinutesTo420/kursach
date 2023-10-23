<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function __invoke(Category $category, SubCategory $sub_category)
    {
        return view('subcategory', compact('category', 'sub_category'));
    }
}
