@extends('layouts.app')
@section('content')
    <form action="{{ route('admin_categories.update', $item->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.categories._inc_category_update_left')
                </div>
                <div class="col-md-4">
                    @include('blog.admin.categories._inc_category_update_right')
                </div>
            </div>
        </div>
    </form>
@endsection
