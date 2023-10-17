@extends('layouts.page')

@section('content')
<!-- Post preview-->
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($products as $product)
    <div class="col">
        <div class="card h-100">
          <img src="{{ asset('/storage/products/' . $product->image) }}" style="height: 250px" class="card-img-top rounded" alt="{{ $product->title }}">
          <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <p class="card-text">{{ $product->description }}</p>

            {{-- add to wishlist --}}
            <form method="POST" action="{{ route('pages.cart.addToCart', $product->id) }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-outline-danger">
                  Add to Card
                </button>
            </form>

              {{-- add to wishlist --}}
              {{-- <form method="POST" action="{{ route('pages.wishlist.addToWishlist', $product->id) }}" id="wishlistForm">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <a href="#" onclick="changeIcon(this);">
                    <i id="heartIcon" class="{{ $product->is_wished ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
                </a>
              </form> --}}


              <form method="POST" action="{{ route('pages.wishlist.addToWishlist', $product->id) }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <a href="#" onclick="this.closest('form').submit(); return false;">
                    <i class="fa-regular fa-heart"></i>
                    {{-- <i class="fa-solid fa-heart"></i> --}}
                </a>
              </form>
          </div>
        </div>
      </div>
    @endforeach
</div>
@endsection

