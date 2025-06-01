<?php

// app/Models/Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_url', 'description'];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
    
// Di model Category
public function getImageUrlAttribute()
{
    // Coba cari gambar berdasarkan nama kategori
    $imageName = strtolower(str_replace(' ', '-', $this->name)) . '.jpg';
    $imagePath = 'images/categories/' . $imageName;
    
    // Kalau ada file nya, pakai itu. Kalau ga ada, pakai default
    if (file_exists(public_path($imagePath))) {
        return asset($imagePath);
    }
    
    return asset('images/default-category.jpg');
}

}
