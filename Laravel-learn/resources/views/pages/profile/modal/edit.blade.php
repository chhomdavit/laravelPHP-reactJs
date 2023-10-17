<form action="{{ route('pages.profile.update', $profile->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="Update-Modal{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" required class="form-control" id="name" name="name" value="{{ $profile->author->name }}">
                </div> --}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="address_desc" class="form-label">Address</label>
                    <input type="text" required class="form-control" id="address_desc" name="address_desc" value="{{ $profile->address_desc }}">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="telephone" class="form-label">telephone</label>
                    <input type="text" required class="form-control" id="telephone" name="telephone" value="{{ $profile->telephone }}">
                </div>

                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="email" class="form-label">email</label>
                    <input type="text" required class="form-control" id="email" name="email" value="{{ $profile->author->email }}">
                </div> --}}

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
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
    </div>
</form>

