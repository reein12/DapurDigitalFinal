<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Homepage; // Tambah import ini
use App\Http\Controllers\HomeController;



Route::get('/dashboard', function () {
    return view('home');
})->name('dashboard');

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipe.index');

Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');

Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');

Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');

Route::get('/', [HomeController::class, 'index']);

Route::get('/recipes/{category}', [RecipeController::class, 'byCategory'])->name('recipes.category');

Route::get('/categories/{id}', [HomeController::class, 'showCategoryRecipes'])->name('categories.show');
Route::get('/categories/{category}/recipes', [HomeController::class, 'getCategoryRecipes'])->name('categories.recipes');
Route::get('/home', [HomeController::class, 'index'])->name('home');
