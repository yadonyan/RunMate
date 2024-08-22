<x-app-layout>
<div class="container">
    <h1>Post Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post->content }}</h5>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
            @endif
            <p class="text-muted">Posted by {{ $post->user->name }} on {{ $post->created_at->toFormattedDateString() }}</p>
        </div>
    </div>

    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary mt-3">Edit</a>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
</x-app-layout>

