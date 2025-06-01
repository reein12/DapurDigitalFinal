<?php
// app/Models/Recipe.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'author',
        'category_id',
    ];

    public function details()
    {
        return $this->hasMany(RecipeDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
}

