@extends('layouts.page')

@section('content')
<h1>My Cart</h1>
<div class="card-body table-responsive p-0">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-1">Product</th>
                        <th class="col-md-1">Unit Price</th>
                        <th class="col-md-1">Quantity</th>
                        <th class="col-md-1">Total Price</th>
                        <th class="col-md-1">Image</th>
                        <th class="col-md-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @if($carts->isEmpty())
                        <tr>
                            <td colspan="5">There is no record.</td>
                        </tr>
                    @else
                        @foreach($carts as $cart)
                            <tr>
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $cart->product->title }}</td>
                                <td>{{ $cart->product->price }} $</td>
                                <td>
                                 <form action="{{ route('pages.cart.updateCart', $cart->id) }}" method="POST">
                                     @csrf
                                     @method('PUT')
                                     <input type="number" style="width: 50px"  name="quantity" value="{{ $cart->quantity }}" min="1">
                                     <button type="submit"class="btn-primary rounded">Update</button>
                                 </form>
                                </td>
                                <td>{{ $cart->product->price * $cart->quantity }} $</td>
                                @php
                                    $totalPrice += $cart->product->price * $cart->quantity
                                @endphp
                                <td>
                                  @if(!empty($cart->product->image))
                                     <img src="{{ asset('/storage/products/' . $cart->product->image) }}" class="w-50 h-30 rounded"/>
                                  @endif
                                </td>
                                <td>
                                     <a class="btn btn-danger rounded" href="{{ route('pages.cart.forceDestroy', $cart->id) }}" data-toggle="modal" data-target="#Detele-Modal{{ $cart->id }}">
                                            Delete
                                     </a>
                                </td>
                                @include('pages.cart.modal.delete')
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <div><h3>Sub Total Price</h3></div>
                <div class="badge bg-primary text-wrap" style="width: 10rem;"><h3>$ {{ $totalPrice }}</h3></div>
            </div>
        </div>
        <div class="col-md-4 p-5">
            <div class="card">
                <div class="card-title m-auto">
                    <h2 class="bg-white">Cart Summary</h2>
                </div>
                <hr/>
                <div class="card-body">
                    <div class="d-flex justify-content-between pd-2">
                        <div class=" font-weight-bold">Subtotal</div>
                        <div>$ {{ $totalPrice }}</div>
                    </div>

                    <div class="d-flex justify-content-between pd-2">
                        <div class=" font-weight-bold">Shipping</div>
                        <div>$ {{ $shippingPrice = 0 }}</div>
                    </div>
                    <hr/>
                    <div class="d-flex justify-content-between">
                        <div><h5>Total Price</h5></div>
                        <div class="badge bg-primary text-wrap" style="width: 6rem;"><h5>$ {{ $totalPrice + $shippingPrice }}</h5></div>
                    </div>
                    <div class="tp-5 m-1">
                        <form action="{{ route('pages.cart.storeCheckout') }}" method="POST">
                            @csrf
                            <input type="text" name="address" class="form-control mt-2" placeholder="Enter Address" id="" required>
                            <input type="text" name="phone" class="form-control mt-2" placeholder="Enter phone" id="" required>
                            <input type="hidden" name="bill" class="form-control mt-2" value="{{ $totalPrice }}" placeholder="Enter Address" id="">
                            <input type="submit" name="checkout" class="btn btn-dark btn-block w-100  mt-2" value="Proceed to Checkout" id="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
