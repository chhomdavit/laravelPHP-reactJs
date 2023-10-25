
<form action="{{route('admin.orders.update', $order->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal-update{{ $order->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Status Order</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="order_status_id" class="form-label">orderStatus</label>
                        <select type="text" required class="form-control" id="order_status_id" name="order_status_id">
                            <option value="">Please select orderStatus</option>
                            @foreach ($orderStatus as $orderStatus_id => $orderStatus_title)
                            <option value="{{ $orderStatus_id }}" {{ old('orderStatus_id', $order->orderStatus_id) == $orderStatus_id ? 'selected' : '' }}>{{ $orderStatus_title }}</option>
                            @endforeach
                        </select>
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


