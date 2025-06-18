<!-- Edit Sale Modal -->
<div class="modal fade" id="editSaleModal" tabindex="-1" aria-labelledby="editSaleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="updateSaleForm">
            @csrf
            <input type="hidden" name="sale_id" id="sale_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sale</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    {{-- Member Select --}}
                    <div class="form-group">
                        <label for="edit_user_id"><b>Select Member</b></label>
                        <select name="user_id" id="edit_user_id" class="form-control show-tick">
                            <option value="">-- Select Member --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Amount --}}
                    <div class="form-group">
                        <label for="edit_amount"><b>Amount (BDT)</b></label>
                        <div class="form-group" style="border: 1px solid #ccc">
                        <input type="number" step="0.01" id="edit_amount" name="amount" class="form-control"
                            placeholder="Enter amount">
                        </div>
                    </div>

                    {{-- Points --}}
                    <div class="form-group">
                        <label for="edit_points"><b>Points</b></label>
                        <div class="form-group" style="border: 1px solid #ccc">
                        <input type="number" id="edit_points" name="points" class="form-control"
                            placeholder="Enter number of points">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
