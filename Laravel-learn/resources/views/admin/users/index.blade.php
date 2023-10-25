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
                <th class="col-md-1">Image</th>
                <th scope="col">
                    <a class="btn btn-success rounded" href="{{ route('admin.users.index') }}" data-toggle="modal" data-target="#modal-create">
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
                            @if(!empty($user->image))
                            <img src="{{ asset('/storage/users/' . $user->image) }}" class="brand-image img-circle elevation-3" style="opacity: .8/; width: 50px; height: 50px;">
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-primary rounded elevation-3" href="{{ route('admin.users.update', $user->id) }}" data-toggle="modal" data-target="#modal-update{{ $user->id }}">
                                    Update
                                 </a>
                                &nbsp;
                                <a class="btn btn-info rounded elevation-3" href="{{ route('admin.users.updateRole', $user->id) }}" data-toggle="modal" data-target="#modal-update-role{{ $user->id }}">
                                    Update Role
                                 </a>
                                &nbsp;
                                <a class="btn btn-danger rounded elevation-3" href="{{ route('admin.users.forceDestroy', $user->id) }}" data-toggle="modal" data-target="#modal-delete{{ $user->id }}">
                                    Delete
                                 </a>
                            </div>
                        </td>
                        @include('admin.users.modal.create')
                        @include('admin.users.modal.edit')
                        @include('admin.users.modal.editRole')
                        @include('admin.users.modal.delete')
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
 </div>
{!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection
