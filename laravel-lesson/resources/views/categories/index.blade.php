@extends('layouts.page')

@section('content')
    <h1>Categories</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">
                    <a href="{{ route('categories.create') }}">+ New</a>
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
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
