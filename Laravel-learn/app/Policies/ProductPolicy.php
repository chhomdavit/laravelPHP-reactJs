<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{


    public function updateProduct(User $user, Product $product): bool
    {
        return $user->role === 'Admin' || $user->id === $product->author_id;
    }


    public function deleteProduct(User $user, Product $product): bool
    {
        return $user->role === 'Admin' || $user->id === $product->author_id;
    }

}
