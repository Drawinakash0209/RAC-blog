<?php

namespace Tests\Feature;

use App\Models\ExcoMember;
use App\Models\ExcoPosition;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExcoPositionTest extends TestCase
{
    use RefreshDatabase;

    public function test_positions_index_page_renders(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/exco-positions');

        $response->assertOk();
        $response->assertSee('Manage Exco Positions');
        $response->assertSee('Joint-Secretary');
    }

    public function test_new_position_appears_in_create_and_edit_dropdowns(): void
    {
        $user = User::factory()->create();
        // joint_secretary is seeded by the exco_positions migration itself.

        $create = $this->actingAs($user)->get('/exco/create');
        $create->assertOk();
        $create->assertSee('Joint-Secretary');

        $member = ExcoMember::create([
            'name' => 'Test Member', 'position' => 'joint_secretary', 'email' => 'js@example.com',
            'about' => 'desc', 'phone' => '070', 'image' => 'exco/x.jpg', 'linkedin' => '',
        ]);

        $edit = $this->actingAs($user)->get('/exco/'.$member->id.'/edit');
        $edit->assertOk();
        $edit->assertSee('Joint-Secretary');
    }

    public function test_public_exco_page_shows_exact_admin_authored_label(): void
    {
        // joint_secretary is seeded by the exco_positions migration itself.
        ExcoMember::create([
            'name' => 'Nehaa Test', 'position' => 'joint_secretary', 'email' => 'nehaa@example.com',
            'about' => 'desc', 'phone' => '070', 'image' => 'exco/x.jpg', 'linkedin' => '',
        ]);

        $response = $this->get('/home/exco');

        $response->assertOk();
        $response->assertSee('Joint-Secretary');
    }

    public function test_member_with_no_matching_position_row_falls_back_to_formatted_slug(): void
    {
        // No ExcoPosition seeded for this slug at all — simulates a deleted/renamed position.
        ExcoMember::create([
            'name' => 'Orphaned Member', 'position' => 'some_old_role', 'email' => 'orphan@example.com',
            'about' => 'desc', 'phone' => '070', 'image' => 'exco/x.jpg', 'linkedin' => '',
        ]);

        $response = $this->get('/home/exco');

        $response->assertOk();
        $response->assertSee('Some Old Role');
    }

    public function test_renaming_a_position_updates_the_label_for_existing_members(): void
    {
        $user = User::factory()->create();
        // secretary is seeded by the exco_positions migration itself.
        $position = ExcoPosition::where('slug', 'secretary')->firstOrFail();
        ExcoMember::create([
            'name' => 'Saleesha Test', 'position' => 'secretary', 'email' => 'saleesha@example.com',
            'about' => 'desc', 'phone' => '070', 'image' => 'exco/x.jpg', 'linkedin' => '',
        ]);

        $this->actingAs($user)->put('/exco-positions/'.$position->id, ['name' => 'Joint-Secretary']);

        $response = $this->get('/home/exco');
        $response->assertOk();
        $response->assertSee('Joint-Secretary');
    }
}
