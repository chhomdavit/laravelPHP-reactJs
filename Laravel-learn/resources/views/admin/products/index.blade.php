@extends('admin.dashboard')

@section('content')
    <h1>Product</h1>
 <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-1">Title</th>
                <th class="col-md-1">Price</th>
                <th class="col-md-1">Category</th>
                <th class="col-md-1">Author</th>
                <th class="col-md-2">Image</th>
                <th class="col-md-2">Description</th>
                <th class="col-md-1">
                    <a class="btn btn-success rounded" href="{{ route('admin.products.store') }}" data-toggle="modal" data-target="#modal-create">New Post
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($products->isEmpty())
                <tr>
                    <td colspan="5">There is no record.</td>
                </tr>
            @else
                @foreach($products as $product)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }} $</td>
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->author?->name }}</td>
                        <td>
                            @if(!empty($product->image))
                            <img src="{{ asset('/storage/products/' . $product->image) }}" class="rounded" style="width: 200px" height="150px"/>
                            @endif
                        </td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @can('updateProduct', $product)
                                    <a class="btn btn-primary rounded" href="{{ route('admin.posts.update', $product->id) }}" data-toggle="modal" data-target="#modal-update{{ $product->id }}">
                                        Edit
                                    </a>
                                @endcan

                                &nbsp;
                                @can('deleteProduct', $product)
                                    <a class="btn btn-danger rounded" href="{{ route('admin.posts.forceDestroy', $product->id) }}" data-toggle="modal" data-target="#modal-delete{{ $product->id }}">
                                        Delete
                                    </a>
                                @endcan
                            </div>
                        </td>
                        @include('admin.products.modal.create')
                        @include('admin.products.modal.edit')
                        @include('admin.products.modal.delete')
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
 </div>
    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection



