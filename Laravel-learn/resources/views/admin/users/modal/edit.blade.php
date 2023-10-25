<form action="{{route('admin.users.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-update{{ $user->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $user->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="name" class="form-label">name</label>
                        <input type="text" required class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="role" class="form-label">role</label>
                        <input type="text" required class="form-control" id="role" name="role" value="{{ $user->role }}">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="email" class="form-label">email</label>
                        <input type="text" required class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="selectedImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="selectedImage" name="selectedImage">
                        <br/>
                        @if($user->image)
                            <img src="{{ asset('storage/users/' . $user->image) }}" alt="{{ $user->name }}" style="width: 100px; height: 75px;" class="rounded">
                        @endif
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="old_password" class="form-label">old password</label>
                        <input type="password" required class="form-control" id="old_password" name="old_password">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="new_password" class="form-label">new password</label>
                        <input type="password" required class="form-control" id="new_password" name="new_password">
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
