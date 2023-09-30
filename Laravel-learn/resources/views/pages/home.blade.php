@extends('layouts.page')

@section('content')
<!-- Post preview-->
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($posts as $post)
    <div class="col">
        <div class="card h-100">
          <img src="{{ asset('/storage/posts/' . $post->image) }}" class="card-img-top w-75 h-50 rounded" alt="{{ $post->title }}">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->description }}</p>
          </div>
        </div>
      </div>
    @endforeach
</div>
@endsection
