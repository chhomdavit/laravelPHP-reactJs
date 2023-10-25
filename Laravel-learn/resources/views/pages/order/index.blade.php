@extends('layouts.page')

@section('content')
<div class="card-body table-responsive p-0">
    <div class="row">
        <div class="col-md-12 p-5 m-auto">
            <div class="card">
                <div class="card-title m-auto">
                    <h2 class="bg-white">Your Order</h2>
                </div>
                <hr/>
                <div class="card-body">

                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-1">Product</th>
                                <th class="col-md-1">Price</th>
                                <th class="col-md-1">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($productOrders->isEmpty())
                                <tr>
                                    <td colspan="5">There is no record.</td>
                                </tr>
                            @else
                                @foreach($productOrders as $productOrder)
                                    <tr>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $productOrder->product->title}}</td>
                                        <td>$ {{ $productOrder->product->price}}</td>
                                        <td>{{ $productOrder->quantity}} Qty</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <hr/>

                    @if($orders->isEmpty())
                        <tr>
                            <td colspan="5">There is no record.</td>
                        </tr>
                    @else
                        @foreach($orders as $order)
                            <div class="d-flex justify-content-between">
                                <div><h5>Total Price :</h5></div>
                                <div class="badge bg-primary text-wrap m-1" style="width: 6rem;"><h5>$ {{ $order->bill }}</h5></div>
                                <div class="badge bg-success text-wrap m-1" style="width: 10rem; color: yellow "><h5>{{ $order->status->title }}</h5></div>
                                <div style="width: 15rem; "><h5>Payment By {{ $order->payment->title }}</h5></div>
                                <div style="width: 15rem; "><h5>Order date : {{ $order->created_at->format('d-m-Y') }}</h5></div>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>

    </div>
</div>
@endsection

