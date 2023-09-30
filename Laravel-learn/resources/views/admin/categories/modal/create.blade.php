<form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Create New Category') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" required class="form-control" id="title" name="title" placeholder="">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary rounded">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
