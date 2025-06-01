<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //  


    public function index()
    {
        $recipes = Recipe::all();
        $categories = Category::all();
        return view('home', compact('recipes', 'categories'));
    }

    public function showCategoryRecipes($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $recipes = Recipe::where('category_id', $categoryId)->paginate(12);
        $allCategories = Category::all();
        
        return view('listmeals', compact('category', 'recipes', 'allCategories'));
    }

    // Method untuk AJAX request (opsional)
    public function getCategoryRecipes($categoryId)
    {
        $recipes = Recipe::where('category_id', $categoryId)->get();
        
        return response()->json([
            'recipes' => $recipes
        ]);
    }

    
}
