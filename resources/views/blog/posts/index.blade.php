@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul>
                    @foreach($posts as $post)
                        <li>{{ $post->title }}</li>
                    @endforeach
                </ul>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
