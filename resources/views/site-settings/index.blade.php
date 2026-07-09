<x-app-layout>

    <!-- Page Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin: 0;">
            <i class="fas fa-cog" style="color: var(--accent-start); margin-right: 0.5rem;"></i>
            Site Settings
        </h1>
        <p style="font-size: 0.875rem; color: var(--text-secondary); margin-top: 0.25rem;">
            Manage your home page content — hero banners, text, theme banner, and about section.
        </p>
    </div>

    @if(session('message'))
    <div style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 0.75rem 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; font-size: 0.8125rem; font-weight: 500; display: flex; align-items: center; gap: 0.5rem;">
        <i class="fas fa-check-circle"></i>
        {{ session('message') }}
    </div>
    @endif

    <!-- ══════════════════════════════════════════════════════════ -->
    <!-- SECTION 1: Hero Banner Images                             -->
    <!-- ══════════════════════════════════════════════════════════ -->
    <div style="background: white; border: 1px solid var(--border-color); border-radius: 0.75rem; padding: 1.5rem; margin-bottom: 1.5rem;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
            <div>
                <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-primary); margin: 0;">Hero Banner Images</h2>
                <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">These images rotate in the hero section on the home page. If no banners are uploaded, the default images will be used.</p>
            </div>
        </div>

        <!-- Upload Form -->
        <form action="{{ route('site-settings.banner.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; gap: 0.75rem; align-items: flex-end; flex-wrap: wrap; margin-bottom: 1.5rem; padding: 1rem; background: #f8fafc; border-radius: 0.5rem; border: 1px dashed var(--border-color);">
            @csrf
            <div style="flex: 1; min-width: 200px;">
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Banner Image *</label>
                <input type="file" name="image" accept="image/*" required
                       style="width: 100%; font-size: 0.8125rem; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: white;">
            </div>
            <div style="min-width: 150px;">
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Alt Text</label>
                <input type="text" name="alt_text" placeholder="Hero Banner" value="Hero Banner"
                       style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
            </div>
            <button type="submit" style="padding: 0.5rem 1.25rem; background: linear-gradient(135deg, var(--accent-start), var(--accent-end)); color: white; border: none; border-radius: 0.5rem; font-size: 0.8125rem; font-weight: 600; cursor: pointer; white-space: nowrap;">
                <i class="fas fa-plus" style="margin-right: 0.375rem;"></i> Add Banner
            </button>
        </form>

        <!-- Existing Banners Grid -->
        @if($heroBanners->count())
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
            @foreach($heroBanners as $banner)
            <div style="position: relative; border-radius: 0.5rem; overflow: hidden; border: 2px solid {{ $banner->is_active ? '#a7f3d0' : '#fecaca' }}; transition: all 0.2s ease;">
                <img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->alt_text }}"
                     style="width: 100%; height: 140px; object-fit: cover; display: block;">
                
                <!-- Overlay controls -->
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.5rem 0.75rem; background: {{ $banner->is_active ? '#f0fdf4' : '#fef2f2' }};">
                    <span style="font-size: 0.6875rem; font-weight: 600; color: {{ $banner->is_active ? '#065f46' : '#991b1b' }};">
                        <i class="fas {{ $banner->is_active ? 'fa-check-circle' : 'fa-times-circle' }}" style="margin-right: 0.25rem;"></i>
                        {{ $banner->is_active ? 'Active' : 'Inactive' }}
                    </span>
                    <div style="display: flex; gap: 0.5rem;">
                        <form action="{{ route('site-settings.banner.toggle', $banner) }}" method="POST" style="display:inline;">
                            @csrf @method('PATCH')
                            <button type="submit" title="{{ $banner->is_active ? 'Deactivate' : 'Activate' }}"
                                    style="background: none; border: none; cursor: pointer; font-size: 0.8125rem; color: {{ $banner->is_active ? '#f59e0b' : '#10b981' }};">
                                <i class="fas {{ $banner->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                            </button>
                        </form>
                        <form action="{{ route('site-settings.banner.destroy', $banner) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this banner?');">
                            @csrf @method('DELETE')
                            <button type="submit" title="Delete" style="background: none; border: none; cursor: pointer; font-size: 0.8125rem; color: #ef4444;">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align: center; padding: 2rem; color: var(--text-muted); font-size: 0.8125rem;">
            <i class="fas fa-images" style="font-size: 2rem; display: block; margin-bottom: 0.75rem; opacity: 0.3;"></i>
            No banners uploaded yet. Default images will be used.
        </div>
        @endif
    </div>


    <!-- ══════════════════════════════════════════════════════════ -->
    <!-- SECTION 2: Hero Text Content                              -->
    <!-- ══════════════════════════════════════════════════════════ -->
    <div style="background: white; border: 1px solid var(--border-color); border-radius: 0.75rem; padding: 1.5rem; margin-bottom: 1.5rem;">
        <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-primary); margin: 0 0 0.25rem 0;">Hero Section Text</h2>
        <p style="font-size: 0.75rem; color: var(--text-muted); margin-bottom: 1.25rem;">Edit the title, subtitle, and CTA buttons shown in the hero banner. Leave blank to use default values.</p>

        <form action="{{ route('site-settings.hero-text.update') }}" method="POST">
            @csrf @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Title (main line)</label>
                    <input type="text" name="hero_title" value="{{ $hero['hero_title'] ?? '' }}" placeholder="Driven by service,"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Title (highlighted)</label>
                    <input type="text" name="hero_title_highlight" value="{{ $hero['hero_title_highlight'] ?? '' }}" placeholder="defined by change"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Subtitle</label>
                <textarea name="hero_subtitle" rows="2" placeholder="The Rotaract Club of APIIT — a community of students turning service into lasting impact."
                          style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; resize: vertical;">{{ $hero['hero_subtitle'] ?? '' }}</textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Primary CTA Text</label>
                    <input type="text" name="hero_cta_primary_text" value="{{ $hero['hero_cta_primary_text'] ?? '' }}" placeholder="Discover Our Story"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Primary CTA URL</label>
                    <input type="text" name="hero_cta_primary_url" value="{{ $hero['hero_cta_primary_url'] ?? '' }}" placeholder="#aboutus"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.25rem;">
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Secondary CTA Text</label>
                    <input type="text" name="hero_cta_secondary_text" value="{{ $hero['hero_cta_secondary_text'] ?? '' }}" placeholder="Read Our Blog"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Secondary CTA URL</label>
                    <input type="text" name="hero_cta_secondary_url" value="{{ $hero['hero_cta_secondary_url'] ?? '' }}" placeholder="/blog"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
            </div>

            <button type="submit" style="padding: 0.5rem 1.5rem; background: linear-gradient(135deg, var(--accent-start), var(--accent-end)); color: white; border: none; border-radius: 0.5rem; font-size: 0.8125rem; font-weight: 600; cursor: pointer;">
                <i class="fas fa-save" style="margin-right: 0.375rem;"></i> Save Hero Text
            </button>
        </form>
    </div>


    <!-- ══════════════════════════════════════════════════════════ -->
    <!-- SECTION 3: Theme Banner                                   -->
    <!-- ══════════════════════════════════════════════════════════ -->
    <div style="background: white; border: 1px solid var(--border-color); border-radius: 0.75rem; padding: 1.5rem; margin-bottom: 1.5rem;">
        <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-primary); margin: 0 0 0.25rem 0;">Theme Banner</h2>
        <p style="font-size: 0.75rem; color: var(--text-muted); margin-bottom: 1.25rem;">Edit the club theme section (eyebrow, heading, tagline, and CTAs). Leave blank to use default values.</p>

        <form action="{{ route('site-settings.theme-banner.update') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Eyebrow Text</label>
                <input type="text" name="theme_eyebrow" value="{{ $theme['theme_eyebrow'] ?? '' }}" placeholder="Club Theme 2025 / 26"
                       style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Heading (Red part)</label>
                    <input type="text" name="theme_heading_red" value="{{ $theme['theme_heading_red'] ?? '' }}" placeholder="Inspire Service"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Heading (White part)</label>
                    <input type="text" name="theme_heading_white" value="{{ $theme['theme_heading_white'] ?? '' }}" placeholder="Empower Change"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Tagline</label>
                <textarea name="theme_tagline" rows="2" placeholder="A year of bold purpose, meaningful service, and lasting impact."
                          style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; resize: vertical;">{{ $theme['theme_tagline'] ?? '' }}</textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Primary CTA Text</label>
                    <input type="text" name="theme_cta_primary_text" value="{{ $theme['theme_cta_primary_text'] ?? '' }}" placeholder="Our Story"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Primary CTA URL</label>
                    <input type="text" name="theme_cta_primary_url" value="{{ $theme['theme_cta_primary_url'] ?? '' }}" placeholder="#aboutus"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Secondary CTA Text</label>
                    <input type="text" name="theme_cta_secondary_text" value="{{ $theme['theme_cta_secondary_text'] ?? '' }}" placeholder="Explore Projects"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Secondary CTA URL</label>
                    <input type="text" name="theme_cta_secondary_url" value="{{ $theme['theme_cta_secondary_url'] ?? '' }}" placeholder="/home"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Banner Background Image</label>
                @if(!empty($theme['theme_banner_image']))
                    <div style="margin-bottom: 0.5rem;">
                        <img src="{{ Storage::url($theme['theme_banner_image']) }}" alt="Current banner" style="height: 80px; border-radius: 0.375rem; object-fit: cover;">
                        <span style="font-size: 0.6875rem; color: var(--text-muted); margin-left: 0.5rem;">Current image</span>
                    </div>
                @endif
                <input type="file" name="theme_banner_image" accept="image/*"
                       style="width: 100%; font-size: 0.8125rem; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: white;">
            </div>

            <button type="submit" style="padding: 0.5rem 1.5rem; background: linear-gradient(135deg, var(--accent-start), var(--accent-end)); color: white; border: none; border-radius: 0.5rem; font-size: 0.8125rem; font-weight: 600; cursor: pointer;">
                <i class="fas fa-save" style="margin-right: 0.375rem;"></i> Save Theme Banner
            </button>
        </form>
    </div>


    <!-- ══════════════════════════════════════════════════════════ -->
    <!-- SECTION 4: About Section                                  -->
    <!-- ══════════════════════════════════════════════════════════ -->
    <div style="background: white; border: 1px solid var(--border-color); border-radius: 0.75rem; padding: 1.5rem; margin-bottom: 1.5rem;">
        <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-primary); margin: 0 0 0.25rem 0;">About Us Section</h2>
        <p style="font-size: 0.75rem; color: var(--text-muted); margin-bottom: 1.25rem;">Edit the about section content and image. Leave blank to use default values.</p>

        <form action="{{ route('site-settings.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Eyebrow Text</label>
                    <input type="text" name="about_eyebrow" value="{{ $about['about_eyebrow'] ?? '' }}" placeholder="Who We Are"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Section Title</label>
                    <input type="text" name="about_title" value="{{ $about['about_title'] ?? '' }}" placeholder="About Us"
                           style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem;">
                </div>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">Description</label>
                <textarea name="about_description" rows="6" placeholder="Welcome to the Rotaract Club of APIIT!..."
                          style="width: 100%; font-size: 0.8125rem; padding: 0.5rem 0.75rem; border: 1px solid var(--border-color); border-radius: 0.375rem; resize: vertical; line-height: 1.6;">{{ $about['about_description'] ?? '' }}</textarea>
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.375rem;">About Image</label>
                @if(!empty($about['about_image']))
                    <div style="margin-bottom: 0.5rem;">
                        <img src="{{ Storage::url($about['about_image']) }}" alt="Current about image" style="height: 80px; border-radius: 0.375rem; object-fit: cover;">
                        <span style="font-size: 0.6875rem; color: var(--text-muted); margin-left: 0.5rem;">Current image</span>
                    </div>
                @endif
                <input type="file" name="about_image" accept="image/*"
                       style="width: 100%; font-size: 0.8125rem; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 0.375rem; background: white;">
            </div>

            <button type="submit" style="padding: 0.5rem 1.5rem; background: linear-gradient(135deg, var(--accent-start), var(--accent-end)); color: white; border: none; border-radius: 0.5rem; font-size: 0.8125rem; font-weight: 600; cursor: pointer;">
                <i class="fas fa-save" style="margin-right: 0.375rem;"></i> Save About Section
            </button>
        </form>
    </div>

    @if ($errors->any())
    <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 0.75rem 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; font-size: 0.8125rem;">
        <ul style="margin: 0; padding-left: 1.25rem;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</x-app-layout>
