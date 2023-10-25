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
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo(order_status::class, 'order_status_id', 'id');
    }
    public function  payment()
    {
        return $this->belongsTo(payment_method::class, 'payment_method_id', 'id');
    }

}
