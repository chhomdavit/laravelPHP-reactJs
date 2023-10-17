<form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" required class="form-control" id="title" name="title" placeholder="">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="category_id" class="form-label">Category</label>
                        <select type="text" required class="form-control" id="category_id" name="category_id">
                            <option value="">Please select category</option>
                            @foreach ($categories as $category_id => $category_title)
                            <option value="{{ $category_id }}">{{ $category_title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="selectedImage" class="form-label">Image</label>
                        <input type="file" required class="form-control" id="selectedImage" name="selectedImage">
                        <img src="" id="previewImage" width="200px"/>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

