<form action="{{ route('admin.profiles.update', $profile->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-update{{ $profile->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="address_desc" class="form-label">address_desc</label>
                        <input type="text" required class="form-control" id="address_desc" name="address_desc" value="{{ $profile->address_desc }}">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="telephone" class="form-label">telephone</label>
                        <input type="text" required class="form-control" id="telephone" name="telephone" value="{{ $profile->telephone }}">
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="selectedImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="selectedImage" name="selectedImage">
                        <br/>
                        @if($profile->image)
                            <img src="{{ asset('storage/profiles/' . $profile->image) }}" alt="{{ $profile->title }}" style="width: 100px; height: 75px;" class="rounded">
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

