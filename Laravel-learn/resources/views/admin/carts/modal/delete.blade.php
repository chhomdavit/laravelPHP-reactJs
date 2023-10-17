<form action="{{ route('admin.carts.forceDestroy', $cart->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="modal-delete{{ $cart->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    You sure you want to delete Post <b>{{ $cart->title }}</b> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
