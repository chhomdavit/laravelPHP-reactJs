@extends('admin.dashboard')

@section('content')
    <h1>Categories</h1>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">
                        <a class="btn btn-success rounded" href="{{ route('admin.categories.store') }}" data-toggle="modal" data-target="#modal-create">
                           New Category
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($categories->isEmpty())
                    <tr>
                        <td colspan="5">There is no record.</td>
                    </tr>
                @else
                    @foreach($categories as $category)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary rounded" href="{{ route('admin.categories.update', $category->id) }}" data-toggle="modal" data-target="#modal-update{{ $category->id }}">
                                        Update
                                     </a>
                                    &nbsp;
                                    <a class="btn btn-danger rounded" href="{{ route('admin.categories.destroy', $category->id) }}" data-toggle="modal" data-target="#modal-delete{{ $category->id }}">
                                        Delete
                                     </a>
                                </div>
                            </td>
                            @include('admin.categories.modal.edit')
                            @include('admin.categories.modal.create')
                            @include('admin.categories.modal.delete')
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection



