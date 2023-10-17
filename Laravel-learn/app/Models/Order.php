<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'payment_method_id',
        'bill',
        'order_status_id',
        'address',
        'phone',
    ];
}
