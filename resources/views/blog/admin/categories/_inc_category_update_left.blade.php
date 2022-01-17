<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"></h3>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#mainData" class="nav-link active" data-toggle="tab" role="tab">Main
                            data</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="mainData" role="tabpanel">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   minlength="3" required value="{{ old('name', $item->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control"
                                   minlength="3" value="{{ old('slug', $item->slug) }}">
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent</label>
                            <select name="parent_id" id="parent_id" class="form-control"
                                    placeholder="Choose category">
                                @foreach($categories as $categoryOption)
                                    @php /** @var \App\Models\BlogCategory $categoryOption  */ @endphp
                                    <option value="{{ $categoryOption->id }}" @if($categoryOption->id === $item->parent_id) selected @endif>{{ $categoryOption->id_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="6"
                                      class="form-control">{{ old('description', $item->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

