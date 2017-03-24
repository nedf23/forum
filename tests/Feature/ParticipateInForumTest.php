<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    public function testUnauthenticatedUsersMayNotAddReplies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/threads/1/replies', []);
    }

    public function testAnAuthenticatedUserMayParticipateInForumThreads()
    {
        $this->be($user = create('App\User'));

        $thread = create('App\Thread');

        $reply = make('App\Reply');
        $this->post($thread->path().'/replies', $reply->toArray());

        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}
