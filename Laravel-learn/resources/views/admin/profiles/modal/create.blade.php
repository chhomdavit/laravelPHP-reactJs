<form action="{{route('admin.profiles.store')}}" method="post" enctype="multipart/form-data">
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
                        <label for="address_desc" class="form-label">address_desc</label>
                        <input type="text" required class="form-control" id="address_desc" name="address_desc" placeholder="">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="telephone" class="form-label">telephone</label>
                        <input type="text" required class="form-control" id="telephone" name="telephone" placeholder="">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="selectedImage" class="form-label">Image</label>
                        <input type="file" required class="form-control" id="selectedImage" name="selectedImage">
                        <img src="" id="previewImage" width="200px"/>
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

