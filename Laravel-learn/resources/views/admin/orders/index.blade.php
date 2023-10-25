@extends('admin.dashboard')

@section('content')
<h1>Orders</h1>

<form action="{{ route('admin.carts.index')}}" method="GET">
    <div class="input-group mb-3 w-25">
        <div class="input-group-prepend">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
          <input type="text" name="search" class="form-control" placeholder="search here...">
    </div>
</form>

 <div class="card-body table-responsive p-0 d-flex">

    <table class="table table-hover text-nowrap col-4">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-1">Name</th>
                <th class="col-md-1">payment</th>
                <th class="col-md-1">total bill</th>
                <th class="col-md-1">status</th>
                <th class="col-md-1">address</th>
                <th class="col-md-1">phone</th>
                <th class="col-md-1">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($orders->isEmpty())
                <tr>
                    <td colspan="5">There is no record.</td>
                </tr>
            @else
                @foreach($orders as $order)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $order->author->name }}</td>
                        <td class="text-primary">{{ $order->payment->title }}</td>
                        <td class="badge bg-danger text-wrap" style="height: 2rem;">$ {{ $order->bill }}</td>
                        <td class="text-success">
                            {{ $order->status->title }}&nbsp;
                            <a class="btn btn-info rounded elevation-3" href="{{ route('admin.orders.update', $order->id) }}" data-toggle="modal" data-target="#modal-update{{ $order->id }}">
                                Change Status
                            </a>
                        </td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>
                            <a class="btn btn-success elevation-3" href="{{ route('admin.orders.index', ['order_id' => $order->id]) }}"> Order User</a>
                        </td>
                        @include('admin.orders.modal.edit')
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    &nbsp;&nbsp;

    <table class="table table-hover text-nowrap col-8">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-1">product_id</th>
                <th class="col-md-1">Image</th>
                <th class="col-md-1">unit price</th>
                <th class="col-md-1">order_id</th>
                <th class="col-md-1">total price</th>
                <th class="col-md-1">quantity</th>
            </tr>
        </thead>

        <tbody>
            @if($productOrders->isEmpty())
                <tr>
                    <td colspan="4">There is no record.</td>
                </tr>
            @else
                @foreach($productOrders as $productOrder)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $productOrder->product->title}}</td>
                        <td>
                            @if(!empty($productOrder->product->image))
                            <img src="{{ asset('/storage/products/' . $productOrder->product->image) }}" class="rounded elevation-3" style="width: 100px; height: 50px;"/>
                            @endif
                        </td>
                        <td>$ {{ $productOrder->product->price }}</td>
                        <td>{{ $productOrder->order_id }}</td>
                        <td>$ {{ $productOrder->product->price * $productOrder->quantity }}</td>
                        <td>{{ $productOrder->quantity }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

 </div>
@endsection



