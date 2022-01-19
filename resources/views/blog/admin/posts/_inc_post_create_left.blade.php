<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"></h3>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#mainData" class="nav-link active" data-toggle="tab" role="tab">Main data</a>
                    </li>
                    <li class="nav-item">
                        <a href="#advance" class="nav-link" data-toggle="tab" role="tab">Advance</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="mainData" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" minlength="3" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" minlength="3">
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Content raw</label>
                            <textarea class="form-control" name="content_raw" id="content_raw" width="100%"
                                      rows="20"></textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="advance" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $categoryOption)
                                    @php /** @var \App\Models\BlogCategory $categoryOption  */ @endphp
                                    <option value="{{ $categoryOption->id }}">{{ $categoryOption->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea class="form-control" name="excerpt" id="excerpt" width="100%" rows="6"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

