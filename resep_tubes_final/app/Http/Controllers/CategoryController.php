<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Recipe;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $categories = Category::all();
        return view('kategori', compact('categories'));
    }

    // Menampilkan semua resep dalam satu kategori
    public function show($id)
    {
        $categoryModel = Category::findOrFail($id);
        $recipes = Recipe::where('category_id', $id)->get();
        return view('listmeals', compact('recipes', 'categoryModel'));
    }
}

