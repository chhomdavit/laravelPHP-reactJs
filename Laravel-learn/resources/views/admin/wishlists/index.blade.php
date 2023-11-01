@extends('admin.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Wishlist</h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover table-striped" id="example2">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Product</th>
                    <th class="col-md-1">Author</th>
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
                    <td>{{ $wishlist->author->name }}</td>
                    <td>
                        <a class="btn btn-primary rounded" href="{{ route('admin.wishlists.update', $wishlist->id) }}"
                            data-toggle="modal" data-target="#modal-update{{ $wishlist->id }}">
                            Edit
                        </a>
                        &nbsp;
                        <a class="btn btn-danger rounded"
                            href="{{ route('admin.wishlists.forceDestroy', $wishlist->id) }}" data-toggle="modal"
                            data-target="#modal-delete{{ $wishlist->id }}">
                            Delete
                        </a>
    </div>
    </td>
    @include('admin.wishlists.modal.edit')
    @include('admin.wishlists.modal.delete')
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>
</div>
{{-- {!! $carts->withQueryString()->links('pagination::bootstrap-5') !!} --}}
</div>
@endsection

<script src="{{ asset('/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>


