<?php

namespace Tests\Feature\Tweet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Tweet;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_delete_successed()
    {
        // 削除用のユーザー作成
        $user = User::factory()->create();

        // 削除用の投稿作成
        $tweet = Tweet::factory()->create(['user_id' => $user->id]);

        // 指定ユーザーをログイン状態にする
        $this->actingAs($user);

        $response = $this->delete('/tweet/delete/' . $tweet->id); //作成した投稿のID指定

        // 削除後のリダイレクト確認
        $response->assertRedirect('/tweet');
    }
}
