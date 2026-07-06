<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_can_be_viewed_by_slug(): void
    {
        $project = Project::factory()->create(['name' => 'Nadun 4.0', 'slug' => null]);

        $response = $this->get('/projects/'.$project->slug);

        $response->assertOk();
        $response->assertSee('Nadun 4.0');
    }

    public function test_project_can_still_be_viewed_by_legacy_numeric_id(): void
    {
        $project = Project::factory()->create(['name' => 'Legacy Project', 'slug' => null]);

        $response = $this->get('/projects/'.$project->id);

        $response->assertOk();
        $response->assertSee('Legacy Project');
    }

    public function test_unknown_project_slug_returns_404(): void
    {
        $response = $this->get('/projects/this-slug-does-not-exist');

        $response->assertNotFound();
    }

    public function test_duplicate_project_names_produce_unique_slugs(): void
    {
        $first = Project::factory()->create(['name' => 'Baila Friday', 'slug' => null]);
        $second = Project::factory()->create(['name' => 'Baila Friday', 'slug' => null]);

        $this->assertNotEquals($first->slug, $second->slug);
        $this->assertSame('baila-friday', $first->slug);
        $this->assertSame('baila-friday-2', $second->slug);
    }
}
