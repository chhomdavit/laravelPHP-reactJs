@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Cart</h2>

        <form action="{{ route('admin.carts.index')}}" method="GET" style="margin-left: 20%">
            <div class="input-group mb-3 w-25">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
                  <input type="text" name="search" class="form-control" placeholder="search here...">
            </div>
        </form>
    </div>

    <div class="card-body table-responsive p-0 d-flex">

        <table class="table table-bordered table-hover table-striped col-4">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Name</th>
                    <th class="col-md-1">Role</th>
                    <th class="col-md-1">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($users->isEmpty())
                    <tr>
                        <td colspan="5">There is no record.</td>
                    </tr>
                @else
                    @foreach($users as $user)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.carts.index', ['user_id' => $user->id]) }}"> Cart This User</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        &nbsp;&nbsp;

        <table class="table table-bordered table-hover table-striped col-8">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Name</th>
                    <th class="col-md-1">Unit Price</th>
                    <th class="col-md-1">Image</th>
                    <th class="col-md-1">Total Price</th>
                    <th class="col-md-1">quantity</th>
                </tr>
            </thead>

            <tbody>
                @if($carts->isEmpty())
                    <tr>
                        <td colspan="4">There is no record.</td>
                    </tr>
                @else
                    @foreach($carts as $cart)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $cart->product->title}}</td>
                            <td>{{ $cart->product->price }} $</td>
                            <td>
                                @if(!empty($cart->product->image))
                                <img src="{{ asset('/storage/products/' . $cart->product->image) }}" class="rounded elevation-3" style="width: 100px; height: 50px;"/>
                                @endif
                            </td>
                            <td>{{ $cart->product->price * $cart->quantity }} $</td>
                            <td>{{ $cart->quantity }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

     </div>

</div>
@endsection



