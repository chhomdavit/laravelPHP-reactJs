 @extends('admin.dashboard')

@section('content')


 <div class="card-body table-responsive p-0 d-flex">
    <table class="table table-hover text-nowrap col-6">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-1">Name</th>
                <th class="col-md-1">Role</th>
                <th class="col-md-1">Email</th>
                <th scope="col">
                    <a class="btn btn-success rounded" href="{{ route('register') }}" data-toggle="modal" data-target="#modal-create">
                       New Category
                    </a>
                </th>
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
                        <td>{{ $user->email }}</td>
                        <td>
                            {{-- <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-primary rounded" href="{{ route('admin.categories.update', $category->id) }}" data-toggle="modal" data-target="#modal-update">
                                    Update
                                 </a>
                                &nbsp;
                                <a class="btn btn-danger rounded" href="{{ route('admin.categories.destroy', $category->id) }}" data-toggle="modal" data-target="#modal-delete">
                                    Delete
                                 </a>
                            </div> --}}
                        </td>
                        @include('admin.users.modal.create')
                        {{-- @include('admin.categories.modal.edit')
                        @include('admin.categories.modal.delete') --}}
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
 </div>
@endsection
