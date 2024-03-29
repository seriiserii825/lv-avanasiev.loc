@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="navbar navbar-toggleable-md navbar-light bg-faded">
                <a class="btn btn-primary" href="{{ route('admin_categories.create') }}">New</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Parent</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            @php /** @var \App\Models\BlogCategory $category */ @endphp
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <a href="{{ route('admin_categories.edit', $category->id) }}">{{ $category->name }}</a>
                                </td>
                                <td>{{ $category->parentCategory->name }}</td>
                                <td>{{ $category->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
