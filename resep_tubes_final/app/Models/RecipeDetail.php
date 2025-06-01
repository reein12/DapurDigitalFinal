<?php

// app/Models/RecipeDetail.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'ingredient',
        'measurement',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    // Di model RecipeDetail
    public function getIngredientsArray()
    {
        preg_match_all('/<li>(.*?)<\/li>/s', $this->ingredient, $matches);
        return array_map(function($item) {
            return trim(strip_tags($item));
        }, $matches[1] ?? []);
    }

    public function getStepsArray()
    {
        preg_match_all('/<li>(.*?)<\/li>/s', $this->measurement, $matches);
        return array_map(function($item) {
            return trim(strip_tags($item));
        }, $matches[1] ?? []);
    }
    
}

