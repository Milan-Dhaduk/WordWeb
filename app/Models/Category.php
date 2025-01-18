<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $fillable = ['title', 'description', 'image', 'status'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }
}
