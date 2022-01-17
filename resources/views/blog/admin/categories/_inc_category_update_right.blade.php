<div class="row justify-content-center">
    @php /** @var \App\Models\BlogCategory $item  */ @endphp
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <input type="submit" value="Update" class="btn btn-success">
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $item->id }}</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="created_at">Created at</label>
                    <input type="date" id="created_at" class="form-control"
                            value="{{ $item->created_at }}" disabled>
                </div>
                <div class="form-group">
                    <label for="updated_at">Updated at</label>
                    <input type="date" id="updated_at" class="form-control"
                           value="{{ $item->updated_at }}" disabled>
                </div>
            </div>
        </div>
    </div>
</div>

