<form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
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
                        <label for="price" class="form-label">Price</label>
                        <input type="text" required class="form-control" id="price" name="price" placeholder="">
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

                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="selectedImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="selectedImage" name="selectedImage">
                        <img src="" id="previewImage" style="margin-top: 10px" width="150px" class="elevation-3 rounded"/>
                    </div> --}}

                    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                        <label for="selectedImage">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="selectedImage" name="selectedImage">
                                <label class="custom-file-label" for="selectedImage">Choose file</label>
                            </div>
                        </div>
                        <div class="mt-2">
                            <img src="" id="previewImage" width="150px" class="img-fluid img-thumbnail"/>
                        </div>
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

<script src="{{ asset('/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#selectedImage').change(function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
    </script>
