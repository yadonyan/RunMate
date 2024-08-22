<x-app-layout>
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    @if($posts->count())
        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <a href="/posts/{{ $post->id }}">{{ $post->content }}</a>
                    <span class="text-muted"> - {{ $post->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p>No posts available.</p>
    @endif
</div>
</x-app-layout>

