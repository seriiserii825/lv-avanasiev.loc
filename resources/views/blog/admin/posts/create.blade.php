@extends('layouts.app')
@section('content')
    @php /** @var \App\BlogPost $item  */ @endphp
    <form action="{{ route('admin_posts.store') }}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @include('blog.admin.posts._inc_post_create_left')
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('blog.admin.posts._inc_post_create_right')
            </div>
        </div>
    </form>
@endsection
