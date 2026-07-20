<?php

namespace Tests\Feature;

use App\Models\SiteContent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TeamHeroSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_site_settings_page_renders_with_new_team_hero_section(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/site-settings');

        $response->assertOk();
        $response->assertSee('Directors &amp; Exco Page Hero Images', false);
    }

    public function test_uploading_a_directors_hero_image_updates_the_public_page(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $file = UploadedFile::fake()->image('dir.png', 1366, 768);

        $response = $this->actingAs($user)->put('/site-settings/team-hero', [
            'directors_hero_image' => $file,
        ]);

        $response->assertRedirect(route('site-settings.index'));

        $stored = SiteContent::getValue('directors_hero_image');
        $this->assertNotNull($stored);
        Storage::disk('public')->assertExists($stored);

        $page = $this->get('/home/directors');
        $page->assertOk();
        $page->assertSee(Storage::url($stored), false);
    }

    public function test_directors_page_falls_back_to_default_image_when_unset(): void
    {
        $response = $this->get('/home/directors');

        $response->assertOk();
        $response->assertSee('storage/hero2/dir.png', false);
    }
}
