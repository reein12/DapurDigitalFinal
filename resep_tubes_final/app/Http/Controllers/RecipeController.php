<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Category;

use Illuminate\Http\Request;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->name = $request->name;
        // ... field lainnya
        
        // Handle upload gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Simpan ke storage/app/public/recipes
            $image->storeAs('recipes', $imageName, 'public');
            $recipe->image = $imageName;
        }
        
        $recipe->save();
        return redirect()->back()->with('success', 'Resep berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
            $recipe = Recipe::with(['details', 'category'])->findOrFail($id);

            // Proses split bahan & langkah
            foreach ($recipe->details as $detail) {
            $detail->ingredients_array = $this->splitIngredients($detail->ingredient);
            $detail->steps_array = $this->splitSteps($detail->measurement);
        }
        return view('recipe', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function splitIngredients($ingredient_string)
    {
        if (strpos($ingredient_string, ',') !== false) {
            return array_map('trim', explode(',', $ingredient_string));
        }

        return [$ingredient_string]; // fallback
    }

    private function splitSteps($steps_string)
    {
        if (strpos($steps_string, '.') !== false) {
            return array_filter(array_map('trim', explode('.', $steps_string)));
        }

        return [$steps_string]; // fallback
    }

    public function byCategory($id)
    {
        $category = Category::findOrFail($id);
        $recipes = $category->recipes;
        
        return view('listmeals', compact('recipes', 'category'));
    }


}
