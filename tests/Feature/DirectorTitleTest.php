<?php

namespace Tests\Feature;

use App\Models\Avenue;
use App\Models\Director;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DirectorTitleTest extends TestCase
{
    use RefreshDatabase;

    public function test_director_with_title_override_shows_the_override(): void
    {
        $avenue = Avenue::factory()->create(['name' => 'Community Service']);
        Director::factory()->create([
            'name' => 'Michele Test',
            'title' => 'Editor',
            'avenue_id' => $avenue->id,
        ]);

        $response = $this->get('/home/directors');

        $response->assertOk();
        $response->assertSee('Editor');
        $response->assertDontSee('Director of Community Service');
    }

    public function test_director_without_title_still_shows_avenue_derived_label(): void
    {
        $avenue = Avenue::factory()->create(['name' => 'Community Service']);
        Director::factory()->create([
            'name' => 'Dilan Test',
            'title' => null,
            'avenue_id' => $avenue->id,
        ]);

        $response = $this->get('/home/directors');

        $response->assertOk();
        $response->assertSee('Director of Community Service');
    }
}
