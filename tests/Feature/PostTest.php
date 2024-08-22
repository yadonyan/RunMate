<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_post()
    {
        // テストユーザーを作成
        $user = User::factory()->create();

        // 認証されたユーザーとして投稿を作成
        $response = $this->actingAs($user)->post('/posts', [
            'content' => 'This is a test post',
        ]);

        // リダイレクトとデータベース確認
        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', [
            'content' => 'This is a test post',
            'user_id' => $user->id,
        ]);
    }
}

