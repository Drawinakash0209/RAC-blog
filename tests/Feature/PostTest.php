<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_can_be_viewed_by_slug(): void
    {
        $post = Post::factory()->create(['title' => 'Hello World Post', 'slug' => null]);

        $response = $this->get('/post/'.$post->slug);

        $response->assertOk();
        $response->assertSee('Hello World Post');
    }

    public function test_post_can_still_be_viewed_by_legacy_numeric_id(): void
    {
        $post = Post::factory()->create(['title' => 'Legacy Link Post', 'slug' => null]);

        $response = $this->get('/post/'.$post->id);

        $response->assertOk();
        $response->assertSee('Legacy Link Post');
    }

    public function test_unknown_slug_returns_404(): void
    {
        $response = $this->get('/post/this-slug-does-not-exist');

        $response->assertNotFound();
    }

    public function test_duplicate_titles_produce_unique_slugs(): void
    {
        $first = Post::factory()->create(['title' => 'Same Title', 'slug' => null]);
        $second = Post::factory()->create(['title' => 'Same Title', 'slug' => null]);

        $this->assertNotEquals($first->slug, $second->slug);
        $this->assertSame('same-title', $first->slug);
        $this->assertSame('same-title-2', $second->slug);
    }

    public function test_updating_title_does_not_change_existing_slug(): void
    {
        $post = Post::factory()->create(['title' => 'Original Title', 'slug' => 'original-title']);

        $post->update(['title' => 'A Brand New Title']);

        $this->assertSame('original-title', $post->fresh()->slug);
    }

    public function test_homepage_only_passes_used_view_data(): void
    {
        $response = $this->get('/home');

        $response->assertOk();
        $response->assertViewHas('news');
        $response->assertViewHas('avenues');
        $response->assertViewHas('projects');
        $response->assertViewHas('events');
        $response->assertViewHas('testimonials');
        $response->assertViewHas('members');
        $response->assertViewMissing('posts');
        $response->assertViewMissing('excoMembers');
        $response->assertViewMissing('directors');
    }
}
