<?php

namespace App\Http\Controllers;

use App\Models\HeroBanner;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller
{
    /**
     * Show the site settings management page.
     */
    public function index()
    {
        $heroBanners = HeroBanner::orderBy('sort_order')->get();

        // Get current values (empty array if none set yet)
        $hero = SiteContent::getGroup('hero');
        $theme = SiteContent::getGroup('theme_banner');
        $about = SiteContent::getGroup('about');

        return view('site-settings.index', compact('heroBanners', 'hero', 'theme', 'about'));
    }

    /**
     * Update hero text content.
     */
    public function updateHeroText(Request $request)
    {
        $request->validate([
            'hero_title'             => 'nullable|string|max:255',
            'hero_title_highlight'   => 'nullable|string|max:255',
            'hero_subtitle'          => 'nullable|string|max:500',
            'hero_cta_primary_text'  => 'nullable|string|max:100',
            'hero_cta_primary_url'   => 'nullable|string|max:255',
            'hero_cta_secondary_text'=> 'nullable|string|max:100',
            'hero_cta_secondary_url' => 'nullable|string|max:255',
        ]);

        $fields = [
            'hero_title', 'hero_title_highlight', 'hero_subtitle',
            'hero_cta_primary_text', 'hero_cta_primary_url',
            'hero_cta_secondary_text', 'hero_cta_secondary_url',
        ];

        foreach ($fields as $field) {
            SiteContent::setValue($field, $request->input($field), 'hero');
        }

        return redirect()->route('site-settings.index')->with('message', 'Hero text updated successfully!');
    }

    /**
     * Update theme banner content.
     */
    public function updateThemeBanner(Request $request)
    {
        $request->validate([
            'theme_eyebrow'          => 'nullable|string|max:255',
            'theme_heading_red'      => 'nullable|string|max:255',
            'theme_heading_white'    => 'nullable|string|max:255',
            'theme_tagline'          => 'nullable|string|max:500',
            'theme_cta_primary_text' => 'nullable|string|max:100',
            'theme_cta_primary_url'  => 'nullable|string|max:255',
            'theme_cta_secondary_text'=> 'nullable|string|max:100',
            'theme_cta_secondary_url'=> 'nullable|string|max:255',
            'theme_banner_image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $fields = [
            'theme_eyebrow', 'theme_heading_red', 'theme_heading_white',
            'theme_tagline', 'theme_cta_primary_text', 'theme_cta_primary_url',
            'theme_cta_secondary_text', 'theme_cta_secondary_url',
        ];

        foreach ($fields as $field) {
            SiteContent::setValue($field, $request->input($field), 'theme_banner');
        }

        // Handle banner background image upload
        if ($request->hasFile('theme_banner_image')) {
            $old = SiteContent::getValue('theme_banner_image');
            if ($old && Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
            $path = $request->file('theme_banner_image')->store('site-settings', 'public');
            SiteContent::setValue('theme_banner_image', $path, 'theme_banner');
        }

        return redirect()->route('site-settings.index')->with('message', 'Theme banner updated successfully!');
    }

    /**
     * Update about section content.
     */
    public function updateAbout(Request $request)
    {
        $request->validate([
            'about_eyebrow'     => 'nullable|string|max:255',
            'about_title'       => 'nullable|string|max:255',
            'about_description' => 'nullable|string|max:5000',
            'about_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $fields = ['about_eyebrow', 'about_title', 'about_description'];

        foreach ($fields as $field) {
            SiteContent::setValue($field, $request->input($field), 'about');
        }

        // Handle about image upload
        if ($request->hasFile('about_image')) {
            $old = SiteContent::getValue('about_image');
            if ($old && Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
            $path = $request->file('about_image')->store('site-settings', 'public');
            SiteContent::setValue('about_image', $path, 'about');
        }

        return redirect()->route('site-settings.index')->with('message', 'About section updated successfully!');
    }

    // ─── Hero Banner CRUD ────────────────────────────────────

    /**
     * Store a new hero banner image.
     */
    public function storeBanner(Request $request)
    {
        $request->validate([
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('hero-banners', 'public');
        $maxOrder = HeroBanner::max('sort_order') ?? 0;

        HeroBanner::create([
            'image'      => $path,
            'alt_text'   => $request->input('alt_text', 'Hero Banner'),
            'sort_order' => $maxOrder + 1,
            'is_active'  => true,
        ]);

        return redirect()->route('site-settings.index')->with('message', 'Banner image added successfully!');
    }

    /**
     * Toggle a banner's active status.
     */
    public function toggleBanner(HeroBanner $banner)
    {
        $banner->update(['is_active' => !$banner->is_active]);
        return redirect()->route('site-settings.index')->with('message', 'Banner status updated!');
    }

    /**
     * Delete a hero banner.
     */
    public function destroyBanner(HeroBanner $banner)
    {
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }
        $banner->delete();

        return redirect()->route('site-settings.index')->with('message', 'Banner deleted successfully!');
    }
}
