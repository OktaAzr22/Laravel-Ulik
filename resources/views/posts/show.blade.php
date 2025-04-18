@extends('layouts.app')

@section('content')
<div class="container card p-6 border rounded-lg">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection