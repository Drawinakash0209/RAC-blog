<?php

namespace Tests\Feature;

use App\Models\Avenue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AvenueTest extends TestCase
{
    use RefreshDatabase;

    public function test_avenue_can_be_viewed_by_slug(): void
    {
        $avenue = Avenue::factory()->create(['name' => 'Community Service', 'slug' => null]);

        $response = $this->get('/avenues/'.$avenue->slug);

        $response->assertOk();
        $response->assertSee('Community Service');
    }

    public function test_avenue_can_still_be_viewed_by_legacy_numeric_id(): void
    {
        $avenue = Avenue::factory()->create(['name' => 'Legacy Avenue', 'slug' => null]);

        $response = $this->get('/avenues/'.$avenue->id);

        $response->assertOk();
        $response->assertSee('Legacy Avenue');
    }

    public function test_unknown_avenue_slug_returns_404(): void
    {
        $response = $this->get('/avenues/this-slug-does-not-exist');

        $response->assertNotFound();
    }

    public function test_duplicate_avenue_names_produce_unique_slugs(): void
    {
        $first = Avenue::factory()->create(['name' => 'Same Name', 'slug' => null]);
        $second = Avenue::factory()->create(['name' => 'Same Name', 'slug' => null]);

        $this->assertNotEquals($first->slug, $second->slug);
        $this->assertSame('same-name', $first->slug);
        $this->assertSame('same-name-2', $second->slug);
    }
}
