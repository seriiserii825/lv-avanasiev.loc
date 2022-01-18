@extends('layouts.app')
@section('content')
    @php /** @var \App\BlogPost $item  */ @endphp
    <form action="{{ route('admin_posts.update', $item->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: @if($item->is_published) green @else red @endif">
                        @if($item->is_published)
                            <span>Published</span>
                        @else
                            <span>Draft</span>
                        @endif
                    </div>
                    <div class="card-body">
                        @include('blog.admin.posts._inc_post_update_left')
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('blog.admin.posts._inc_post_update_right')
            </div>
        </div>
    </form>
    <br>
    <form action="{{ route('admin_posts.destroy', $item->id) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body ml-auto">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
