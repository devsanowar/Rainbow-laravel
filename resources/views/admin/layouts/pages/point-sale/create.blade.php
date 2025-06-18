<!-- Add Point Sale Modal -->
<div class="modal fade" id="addPointSaleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Point Sale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <form class="form-horizontal" action="{{ route('point_sale.store') }}" method="POST"> --}}
                    <form id="pointSaleForm" method="POST" action="{{ route('point_sale.store') }}">

                    @csrf
                    {{-- Member Select --}}
                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                        <label for="user_id"><b>Select Member</b></label>
                        <div class="form-group" style="border: 1px solid #ccc">
                            <select name="user_id" id="user_id" class="form-control show-tick">
                                <option value="">-- Select Member --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('user_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Amount --}}
                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                        <label for="amount"><b>Amount (BDT)</b></label>
                        <div class="form-group" style="border: 1px solid #ccc">
                            <input type="number" step="0.01" id="amount" name="amount" class="form-control"
                                placeholder="Enter amount" value="{{ old('amount') }}">
                        </div>
                        @error('amount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Points --}}
                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                        <label for="points"><b>Points</b></label>
                        <div class="form-group" style="border: 1px solid #ccc">
                            <input type="number" id="points" name="points" class="form-control"
                                placeholder="Enter number of points" value="{{ old('points') }}">
                        </div>
                        @error('points')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                        <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
