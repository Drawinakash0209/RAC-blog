<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exco_positions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed the positions already in use (same slugs the hardcoded dropdown
        // used to offer) plus the new 2026/27 committee positions, so existing
        // exco_members.position values keep matching a real option and the
        // new ones are available immediately after migrating.
        $positions = [
            ['name' => 'President', 'slug' => 'president'],
            ['name' => 'Secretary', 'slug' => 'secretary'],
            ['name' => 'Joint-Secretary', 'slug' => 'joint_secretary'],
            ['name' => 'Vice President', 'slug' => 'vice_president'],
            ['name' => 'Assistant Secretary', 'slug' => 'assistant_secretary'],
            ['name' => 'Sergeant At Arms', 'slug' => 'sergeant_at_arms'],
            ['name' => 'Treasurer', 'slug' => 'treasurer'],
            ['name' => 'Assistant Treasurer', 'slug' => 'assistant_treasurer'],
            ['name' => 'Editor - Posters/Videos', 'slug' => 'editor_posters_videos'],
            ['name' => 'Editor - Content Writer', 'slug' => 'editor_content_writer'],
            ['name' => 'Head of Board of Directors', 'slug' => 'head_of_board_of_directors'],
            ['name' => 'Membership Chair', 'slug' => 'membership_chair'],
            ['name' => 'Special Projects Chair', 'slug' => 'special_projects_chair'],
            ['name' => 'Digital Services Chair', 'slug' => 'digital_services_chair'],
            ['name' => 'Immediate Past President', 'slug' => 'immediate_past_president'],
        ];

        foreach ($positions as $index => $position) {
            DB::table('exco_positions')->insert([
                'name' => $position['name'],
                'slug' => $position['slug'],
                'sort_order' => $index + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exco_positions');
    }
};
