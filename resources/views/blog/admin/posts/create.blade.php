@extends('layouts.app')
@php /** @var \App\Models\BlogCategory $item  */ @endphp
@section('content')
    <form action="{{ route('admin_categories.store') }}" method="post">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.categories._inc_category_create_left')
                </div>
                <div class="col-md-4">
                    @include('blog.admin.categories._inc_category_create_right')
                </div>
            </div>
        </div>
    </form>
@endsection
