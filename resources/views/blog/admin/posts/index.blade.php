@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="navbar navbar-toggleable-md navbar-light bg-faded">
                <a class="btn btn-primary" href="{{ route('admin_posts.create') }}">New</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Is published</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            @php /** @var \App\BlogPost $post  */ @endphp
                            <tr @if(!$post->is_published) style="background-color: #ccc;"  @endif>
                                <td>{{ $post->id }}</td>
                                <td><a href="{{ route('admin_posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    <span>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d-M H:i:s') : '' }}</span>
                                </td>
                                <td>
                                    <span>{{ $post->updated_at ? \Carbon\Carbon::parse($post->updated_at)->format('d-M H:i:s') : '' }}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
