<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'image',
        'address_desc',
        'telephone',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
