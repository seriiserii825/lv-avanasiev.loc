@extends('layouts.app')
@php /** @var \App\Models\BlogCategory $item  */ @endphp
@section('content')
    <form action="{{ route('admin_categories.store') }}" method="post">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3>Create</h3>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </form>
@endsection
