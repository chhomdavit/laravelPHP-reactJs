
<form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade text-left" id="ModalUpdate{{ $post->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update New Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <img src="{{ asset('storage/posts/' . $post->image) }}" alt="{{ $post->title }}" style="width: 150px; height: 100px;">
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $post->description }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary rounded">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>