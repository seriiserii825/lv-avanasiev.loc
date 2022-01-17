@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <ul>
                @foreach($posts as $post)
                    @php /** @var \App\BlogPost $post  */ @endphp
                    <li>{{ $post->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
