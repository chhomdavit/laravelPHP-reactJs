<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'title',
        'price',
        'category_id',
        'author_id',
        'image',
        'description'
    ];

    protected $with = ['category'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'author_id', 'id');
    // }
}

