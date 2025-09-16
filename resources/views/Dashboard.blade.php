@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Dashboard</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Welcome, {{ $user->name }}</h5>
                    <p class="card-text">Email: {{ $user->email }}</p>
                    <p class="card-text">Age: {{ $user->age }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Your Posts</h2>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
            </div>
            
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Created: {{ $post->created_at->format('M d, Y') }}</small>
                                <div>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">
                    You haven't created any posts yet. <a href="{{ route('posts.create') }}">Create your first post</a>.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection