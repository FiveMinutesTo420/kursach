<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;


class CategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        return view('category', compact('category'));
    }
}
