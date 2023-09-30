<form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    <div class="modal fade text-left" id="ModalDelete{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Category Delete') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">You sure you want to delete Category <b>{{ $category->title }} ?</b></div>
                    <div class="modal-footer">
                        <button type="button" class="btn gray btn-outline-secondary rounded" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-danger rounded">Delete</button>
                    </div>
            </div>
        </div>
    </div>
</form>
