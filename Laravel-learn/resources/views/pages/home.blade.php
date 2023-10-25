@extends('layouts.page')

@section('content')
<!-- Post preview-->

<form action="{{ route('pages.home')}}" method="GET">
    <div class="input-group mb-3 w-50" style="left: 30%">
        <div class="input-group-prepend">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
          <input type="text" name="search" class="form-control" placeholder="search here...">
    </div>
</form>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($products as $product)
    <div class="col">
        <div class="card h-100">
          <img src="{{ asset('/storage/products/' . $product->image) }}" style="height: 250px" class="card-img-top rounded" alt="{{ $product->title }}">
          <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <p class="card-text">{{ $product->description }}</p>

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('pages.cart.addToCart', $product->id) }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-outline-danger">
                          Add to Card
                        </button>
                    </form>
                </div>
                <div class="col-md-6" style="left: 20%">
                    <form method="POST" action="{{ route('pages.wishlist.addToWishlist', $product->id) }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <a href="#" onclick="this.closest('form').submit(); return false;">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                      </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
</div>
@endsection

