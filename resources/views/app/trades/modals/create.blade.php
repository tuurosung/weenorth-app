<!-- Create Trade Modal -->
<div class="modal fade" id="newTradeModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Create New Trade
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('trade.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="trade_name" class="form-label">Trade Name</label>
                        <input type="text" class="form-control" name="trade_name" id="trade_name"
                            placeholder="e.g. Carpentry" value="{{ old('trade_name') }}" required />
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4"
                            placeholder="Enter a detailed description of the trade"
                            required>{{ old('description') }}</textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fi fi-br-check me-3"></i>
                        Create Trade
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
