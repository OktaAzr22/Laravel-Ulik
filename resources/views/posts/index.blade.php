@extends('layouts.app')

@section('content')
<div class="container card p-6 border rounded-lg">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
    
    

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-info">View</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                    <form class="delete-form" action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection