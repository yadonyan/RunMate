<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // 投稿の一覧を表示
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // 新規投稿フォームの表示
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // 新規投稿の保存
        $request->validate([
            'content' => 'required|max:255',
            'image' => 'nullable|image',
        ]);

        $post = new Post();
        $post->user_id = auth()->id();
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('images', 'public');
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        //dd($post->user_id);//user_idの確認
        // 投稿の詳細表示
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // 投稿の編集フォームの表示
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // 投稿の更新
        $request->validate([
            'content' => 'required|max:255',
            'image' => 'nullable|image',
        ]);

        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('images', 'public');
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        // 投稿の削除
        $post->delete();

        return redirect()->route('posts.index');
    }
}
