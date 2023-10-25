{{-- @extends('layouts.page')

@section('content')
<h1>My Profile</h1>
<div class="card-body table-responsive p-0">
    <tbody>
        @if($profiles->isEmpty())
        <tr>
            <td colspan="5">There is no record.</td>
            <td>
                <a href="{{ route('pages.profile.store') }}" class="btn btn-success" data-toggle="modal" data-target="#Create-Modal">
                         My Profile
                </a>
            </td>
            @include('pages.profile.modal.create')
        </tr>
        @else
          @foreach($profiles as $profile)
            <div class="container">
             <div class="row">
                <div class="col-md-4">
                    @if(!empty($profile->image))
                    <img src="{{ asset('/storage/profiles/' . $profile->image) }}" style="width: 150px" height="150px"
                        class="rounded-circle m-5"/>
                    @endif
                </div>

                <div class="col-md-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="font-weight: 700">Name</td>
                                <td>{{ $profile->author?->name }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Address</td>
                                <td>{{ $profile->address_desc }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">telephone</td>
                                <td> {{ $profile->telephone }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700">Email</td>
                                <td>{{ $profile->author->email }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="btn btn-primary rounded"
                                        href="{{ route('pages.profile.update', $profile->id) }}" data-toggle="modal"
                                        data-target="#Update-Modal{{ $profile->id }}">
                                        Update
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('pages.profile.forceDestroy', $profile->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#Detele-Modal{{ $profile->id }}">
                                        Delete
                                    </a>
                                </td>
                                @include('pages.profile.modal.edit')
                                @include('pages.profile.modal.delete')
                            </tr>
                        </tbody>
                    </table>
                </div>
             </div>
            </div>
          @endforeach
        @endif
    </tbody>
</div>
@endsection --}}

{{-- ============================================ --}}

@extends('layouts.page')
@section('content')
<h1>My Profile</h1>
<div class="card-body table-responsive p-0">
    @if($users)
        <div class="container">
            <div class="row">

                <div class="col-md-12" style="">
                    @if(!empty($users->image))
                    <img src="{{ asset('/storage/users/' . $users->image) }}" style="width: 150px; height: 150px;" class="rounded-circle img-thumbnail shadow p-3 m-5"/>
                    @endif
                </div>

                <div class="col-md-12">
                    <table class="table">
                        <tbody>

                            <tr>
                                <td style="font-weight: 700">Name</td>
                                <td class="text-uppercase" style="font-weight: 900; font-size: 20px">{{ $users->name }}</td>
                            </tr>

                            <tr>
                                <td style="font-weight: 700">Email</td>
                                <td>{{ $users->email }}</td>
                            </tr>

                            <tr>
                                <td>
                                    <a class="btn btn-primary rounded"
                                        href="{{ route('pages.profile.update', $users->id) }}" data-toggle="modal"
                                        data-target="#Update-Modal{{ $users->id }}">
                                        Update
                                    </a>
                                </td>
                                @include('pages.profile.modal.edit')
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
