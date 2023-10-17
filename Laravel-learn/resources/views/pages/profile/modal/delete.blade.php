<form action="{{ route('pages.profile.forceDestroy', $profile->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="Detele-Modal{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                You sure you want to delete this <b>Profile {{ $profile->id }}</b> ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
    </div>
</form>
