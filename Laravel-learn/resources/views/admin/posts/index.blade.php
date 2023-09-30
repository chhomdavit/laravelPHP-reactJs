@extends('layouts.page')

@section('content')
    <h1>Post</h1>

    <table class="table table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-1">Title</th>
                <th class="col-md-1">Category</th>
                <th class="col-md-1">Author</th>
                <th class="col-md-2">Image</th>
                <th class="col-md-2">Description</th>
                <th class="col-md-1">
                    <a class="btn btn-success rounded" href="{{ route('admin.posts.store') }}" data-bs-toggle="modal" data-bs-target="#ModalCreate">New Post</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($posts->isEmpty())
                <tr>
                    <td colspan="5">There is no record.</td>
                </tr>
            @else
                @foreach($posts as $post)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->title }}</td>
                        <td>{{ $post->author?->name }}</td>
                        <td>
                            @if(!empty($post->image))
                            <img src="{{ asset('/storage/posts/' . $post->image) }}" class="w-75 rounded"/>
                            @endif
                        </td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-primary rounded" href="{{ route('admin.posts.update', $post->id) }}" data-bs-toggle="modal" data-bs-target="#ModalUpdate{{ $post->id }}">Edit</a>
                                &nbsp;
                                <a class="btn btn-danger rounded" href="{{ route('admin.posts.forceDestroy', $post->id) }}" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $post->id }}">Delete</a>
                            </div>
                        </td>
                        @include('admin.posts.modal.edit')
                        @include('admin.posts.modal.create')
                        @include('admin.posts.modal.delete')
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {!! $posts->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection


