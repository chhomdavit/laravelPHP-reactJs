
<form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-update{{ $post->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">You Want Update This Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" required class="form-control" id="title" name="title" value="{{ $post->title }}">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="category_id" class="form-label">Category</label>
                        <select type="text" required class="form-control" id="category_id" name="category_id">
                            <option value="">Please select category</option>
                            @foreach ($categories as $category_id => $category_title)
                            <option value="{{ $category_id }}" {{ old('category_id', $post->category_id) == $category_id ? 'selected' : '' }}>{{ $category_title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="selectedImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="selectedImage" name="selectedImage">
                        @if($post->image)
                            <img src="{{ asset('storage/posts/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100px; height: 75px;">
                        @endif
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $post->description }}</textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
