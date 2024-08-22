<x-app-layout>
<div class="container">
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="img-fluid mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
</x-app-layout>

