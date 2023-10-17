@extends('layouts.page')

@section('content')
<h1>My Wishlist</h1>
<div class="card-body table-responsive p-0">
   <table class="table table-hover text-nowrap">
       <thead>
           <tr>
               <th class="col-md-1">No</th>
               <th class="col-md-1">Product</th>
               <th class="col-md-1">Unit Price</th>
               <th class="col-md-1">Image</th>
               <th class="col-md-1">Action</th>
           </tr>
       </thead>
       <tbody>
           @if($wishlists->isEmpty())
               <tr>
                   <td colspan="5">There is no record.</td>
               </tr>
           @else
               @foreach($wishlists as $wishlist)
                   <tr>
                       <td scope="row">{{ $loop->index + 1 }}</td>
                       <td>{{ $wishlist->product->title }}</td>
                       <td>{{ $wishlist->product->price }} $</td>
                       <td>
                        @if(!empty($wishlist->product->image))
                           <img src="{{ asset('/storage/products/' . $wishlist->product->image) }}" class="w-50 h-30 rounded"/>
                        @endif
                      </td>
                       <td>
                           <a class="btn btn-danger rounded" href="{{ route('pages.wishlist.forceDestroy', $wishlist->id) }}" data-toggle="modal" data-target="#Detele-Modal{{ $wishlist->id }}">
                               Delete
                           </a>
                       </td>
                       @include('pages.wishlist.modal.delete')
                   </tr>
               @endforeach
           @endif
       </tbody>
   </table>
</div>
@endsection
