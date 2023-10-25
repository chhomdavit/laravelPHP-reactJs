<form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="name" class="form-label">name</label>
                        <input type="text" required class="form-control" id="name" name="name" placeholder="name">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="role" class="form-label">role</label>
                        <input type="text" required class="form-control" id="role" name="role" placeholder="role">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="email" class="form-label">email</label>
                        <input type="text" required class="form-control" id="email" name="email" placeholder="email">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="selectedImage" class="form-label">Image</label>
                        <input type="file" required class="form-control" id="selectedImage" name="selectedImage">
                        <img src="" id="previewImage" width="200px"/>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="password" class="form-label">password</label>
                        <input type="text" required class="form-control" id="password" name="password" placeholder="password">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

