@extends('admin.dashboard')

@section('content')
    <h1>profile</h1>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">author_id</th>
                    <th scope="col">image</th>
                    <th scope="col">address_desc</th>
                    <th scope="col">telephone</th>
                    <th scope="col">
                        Action
                        {{-- <a class="btn btn-success rounded" href="{{ route('admin.profiles.store') }}" data-toggle="modal" data-target="#modal-create">
                           New Profile
                        </a> --}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($profiles->isEmpty())
                    <tr>
                        <td colspan="5">There is no record.</td>
                    </tr>
                @else
                    @foreach($profiles as $profile)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $profile->author?->name }}</td>
                            <td>
                                @if(!empty($profile->image))
                                <img src="{{ asset('/storage/profiles/' . $profile->image) }}" style="width: 100px" height="75px" class="rounded"/>
                                @endif
                            </td>
                            <td>{{ $profile->address_desc }}</td>
                            <td>{{ $profile->telephone }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary rounded" href="{{ route('admin.profiles.update', $profile->id) }}" data-toggle="modal" data-target="#modal-update{{ $profile->id }}">
                                        Update
                                     </a>
                                    &nbsp;
                                    <a class="btn btn-danger rounded" href="{{ route('admin.profiles.forceDestroy', $profile->id) }}" data-toggle="modal" data-target="#modal-delete{{ $profile->id }}">
                                        Delete
                                     </a>
                                </div>
                            </td>
                            @include('admin.profiles.modal.create')
                            @include('admin.profiles.modal.edit')
                            @include('admin.profiles.modal.delete')
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    {{-- {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!} --}}
@endsection



