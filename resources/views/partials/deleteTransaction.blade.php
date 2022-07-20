<div class="modal fade mt-10" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Income/Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('add-transaction') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Select Type</label>
                        <select name="type" class="form-control">
                            <option value="0">Expense</option>
                            <option value="1">Income</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input name="amount" type="number" min="1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <textarea name="details" class="form-control"></textarea>
                    </div>
                    @php
                    $today = date("Y-m-d"); 
                    @endphp
                    <div class="form-group">
                        <label>Date</label>
                        <input name="date" type="date" min={{$today}} class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
