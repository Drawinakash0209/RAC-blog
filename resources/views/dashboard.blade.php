<x-app-layout>
    <!-- Page Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin: 0;">
            Welcome back @auth, {{ Auth::user()->name }}@endauth! 👋
        </h1>
        <p style="font-size: 0.875rem; color: var(--text-secondary); margin-top: 0.25rem;">
            Here's what's happening with your site today.
        </p>
    </div>

    <!-- Stats Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">

        <!-- Blog Posts -->
        <a href="/add-post" class="stat-card" style="text-decoration: none; cursor: pointer;">
            <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                <div>
                    <p style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); margin-bottom: 0.5rem;">Blog Posts</p>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--text-primary); line-height: 1;">
                        {{ \App\Models\Post::count() }}
                    </p>
                </div>
                <div class="stat-icon" style="background: rgba(99,102,241,0.1); color: #6366f1;">
                    <i class="fas fa-pen-fancy"></i>
                </div>
            </div>
            <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 0.75rem;">
                <i class="fas fa-arrow-right" style="font-size: 0.625rem; margin-right: 0.25rem;"></i> Manage posts
            </p>
        </a>

        <!-- Projects -->
        <a href="{{ route('projects.index') }}" class="stat-card" style="text-decoration: none; cursor: pointer;">
            <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                <div>
                    <p style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); margin-bottom: 0.5rem;">Projects</p>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--text-primary); line-height: 1;">
                        {{ \App\Models\Project::count() }}
                    </p>
                </div>
                <div class="stat-icon" style="background: rgba(16,185,129,0.1); color: #10b981;">
                    <i class="fas fa-project-diagram"></i>
                </div>
            </div>
            <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 0.75rem;">
                <i class="fas fa-arrow-right" style="font-size: 0.625rem; margin-right: 0.25rem;"></i> Manage projects
            </p>
        </a>

        <!-- Events -->
        <a href="/events" class="stat-card" style="text-decoration: none; cursor: pointer;">
            <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                <div>
                    <p style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); margin-bottom: 0.5rem;">Events</p>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--text-primary); line-height: 1;">
                        {{ \App\Models\Event::count() }}
                    </p>
                </div>
                <div class="stat-icon" style="background: rgba(245,158,11,0.1); color: #f59e0b;">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
            <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 0.75rem;">
                <i class="fas fa-arrow-right" style="font-size: 0.625rem; margin-right: 0.25rem;"></i> Manage events
            </p>
        </a>

        <!-- News -->
        <a href="/news" class="stat-card" style="text-decoration: none; cursor: pointer;">
            <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                <div>
                    <p style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); margin-bottom: 0.5rem;">News</p>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--text-primary); line-height: 1;">
                        {{ \App\Models\news::count() }}
                    </p>
                </div>
                <div class="stat-icon" style="background: rgba(239,68,68,0.1); color: #ef4444;">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
            <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 0.75rem;">
                <i class="fas fa-arrow-right" style="font-size: 0.625rem; margin-right: 0.25rem;"></i> Manage news
            </p>
        </a>

        <!-- Directors -->
        <a href="{{ route('directors.index') }}" class="stat-card" style="text-decoration: none; cursor: pointer;">
            <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                <div>
                    <p style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); margin-bottom: 0.5rem;">Directors</p>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--text-primary); line-height: 1;">
                        {{ \App\Models\Director::count() }}
                    </p>
                </div>
                <div class="stat-icon" style="background: rgba(139,92,246,0.1); color: #8b5cf6;">
                    <i class="fas fa-user-tie"></i>
                </div>
            </div>
            <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 0.75rem;">
                <i class="fas fa-arrow-right" style="font-size: 0.625rem; margin-right: 0.25rem;"></i> Manage directors
            </p>
        </a>

        <!-- Exco Members -->
        <a href="/exco" class="stat-card" style="text-decoration: none; cursor: pointer;">
            <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                <div>
                    <p style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); margin-bottom: 0.5rem;">Exco Members</p>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--text-primary); line-height: 1;">
                        {{ \App\Models\ExcoMember::count() }}
                    </p>
                </div>
                <div class="stat-icon" style="background: rgba(6,182,212,0.1); color: #06b6d4;">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 0.75rem;">
                <i class="fas fa-arrow-right" style="font-size: 0.625rem; margin-right: 0.25rem;"></i> Manage members
            </p>
        </a>

        <!-- Testimonials -->
        <a href="{{ route('testimonials.index') }}" class="stat-card" style="text-decoration: none; cursor: pointer;">
            <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                <div>
                    <p style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); margin-bottom: 0.5rem;">Testimonials</p>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--text-primary); line-height: 1;">
                        {{ \App\Models\Testimonial::count() }}
                    </p>
                </div>
                <div class="stat-icon" style="background: rgba(236,72,153,0.1); color: #ec4899;">
                    <i class="fas fa-quote-right"></i>
                </div>
            </div>
            <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 0.75rem;">
                <i class="fas fa-arrow-right" style="font-size: 0.625rem; margin-right: 0.25rem;"></i> Manage testimonials
            </p>
        </a>

        <!-- Avenues -->
        <a href="{{ route('avenues.index') }}" class="stat-card" style="text-decoration: none; cursor: pointer;">
            <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                <div>
                    <p style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted); margin-bottom: 0.5rem;">Avenues</p>
                    <p style="font-size: 1.75rem; font-weight: 800; color: var(--text-primary); line-height: 1;">
                        {{ \App\Models\Avenue::count() }}
                    </p>
                </div>
                <div class="stat-icon" style="background: rgba(20,184,166,0.1); color: #14b8a6;">
                    <i class="fas fa-road"></i>
                </div>
            </div>
            <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 0.75rem;">
                <i class="fas fa-arrow-right" style="font-size: 0.625rem; margin-right: 0.25rem;"></i> Manage avenues
            </p>
        </a>

    </div>

    <!-- Quick Actions -->
    <div style="margin-bottom: 2rem;">
        <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1rem;">Quick Actions</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 0.75rem;">

            <a href="{{ route('post.create') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.875rem 1rem;background:white;border:1px solid var(--border-color);border-radius:0.625rem;text-decoration:none;transition:all 0.2s ease;font-size:0.8125rem;font-weight:600;color:var(--text-primary);"
               onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.06)';this.style.transform='translateY(-1px)'"
               onmouseout="this.style.boxShadow='none';this.style.transform='none'">
                <span style="width:32px;height:32px;border-radius:8px;background:linear-gradient(135deg,#6366f1,#8b5cf6);display:flex;align-items:center;justify-content:center;color:white;font-size:0.75rem;flex-shrink:0;">
                    <i class="fas fa-plus"></i>
                </span>
                New Blog Post
            </a>

            <a href="{{ route('projects.create') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.875rem 1rem;background:white;border:1px solid var(--border-color);border-radius:0.625rem;text-decoration:none;transition:all 0.2s ease;font-size:0.8125rem;font-weight:600;color:var(--text-primary);"
               onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.06)';this.style.transform='translateY(-1px)'"
               onmouseout="this.style.boxShadow='none';this.style.transform='none'">
                <span style="width:32px;height:32px;border-radius:8px;background:linear-gradient(135deg,#10b981,#059669);display:flex;align-items:center;justify-content:center;color:white;font-size:0.75rem;flex-shrink:0;">
                    <i class="fas fa-plus"></i>
                </span>
                New Project
            </a>

            <a href="{{ route('events.create') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.875rem 1rem;background:white;border:1px solid var(--border-color);border-radius:0.625rem;text-decoration:none;transition:all 0.2s ease;font-size:0.8125rem;font-weight:600;color:var(--text-primary);"
               onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.06)';this.style.transform='translateY(-1px)'"
               onmouseout="this.style.boxShadow='none';this.style.transform='none'">
                <span style="width:32px;height:32px;border-radius:8px;background:linear-gradient(135deg,#f59e0b,#d97706);display:flex;align-items:center;justify-content:center;color:white;font-size:0.75rem;flex-shrink:0;">
                    <i class="fas fa-plus"></i>
                </span>
                New Event
            </a>

            <a href="{{ route('news.create') }}" style="display:flex;align-items:center;gap:0.75rem;padding:0.875rem 1rem;background:white;border:1px solid var(--border-color);border-radius:0.625rem;text-decoration:none;transition:all 0.2s ease;font-size:0.8125rem;font-weight:600;color:var(--text-primary);"
               onmouseover="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.06)';this.style.transform='translateY(-1px)'"
               onmouseout="this.style.boxShadow='none';this.style.transform='none'">
                <span style="width:32px;height:32px;border-radius:8px;background:linear-gradient(135deg,#ef4444,#dc2626);display:flex;align-items:center;justify-content:center;color:white;font-size:0.75rem;flex-shrink:0;">
                    <i class="fas fa-plus"></i>
                </span>
                New Article
            </a>

        </div>
    </div>

    <!-- Recent Activity Placeholder -->
    <div style="background:white;border:1px solid var(--border-color);border-radius:0.75rem;padding:1.5rem;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;">
            <h2 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0;">Recent Content</h2>
            <a href="/add-post" style="font-size:0.75rem;font-weight:600;color:#6366f1;text-decoration:none;">View all →</a>
        </div>
        <div style="overflow-x:auto;">
            <table style="width:100%;border-collapse:collapse;font-size:0.8125rem;">
                <thead>
                    <tr style="border-bottom:1px solid var(--border-color);">
                        <th style="text-align:left;padding:0.75rem 1rem;font-weight:600;color:var(--text-muted);font-size:0.6875rem;text-transform:uppercase;letter-spacing:0.05em;">Title</th>
                        <th style="text-align:left;padding:0.75rem 1rem;font-weight:600;color:var(--text-muted);font-size:0.6875rem;text-transform:uppercase;letter-spacing:0.05em;">Author</th>
                        <th style="text-align:left;padding:0.75rem 1rem;font-weight:600;color:var(--text-muted);font-size:0.6875rem;text-transform:uppercase;letter-spacing:0.05em;">Created</th>
                        <th style="text-align:right;padding:0.75rem 1rem;font-weight:600;color:var(--text-muted);font-size:0.6875rem;text-transform:uppercase;letter-spacing:0.05em;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Post::latest()->take(5)->get() as $post)
                    <tr style="border-bottom:1px solid #f1f5f9;">
                        <td style="padding:0.75rem 1rem;color:var(--text-primary);font-weight:500;">{{ Str::limit($post->title, 45) }}</td>
                        <td style="padding:0.75rem 1rem;color:var(--text-secondary);">{{ $post->user->name ?? 'Unknown' }}</td>
                        <td style="padding:0.75rem 1rem;color:var(--text-muted);">{{ $post->created_at->diffForHumans() }}</td>
                        <td style="padding:0.75rem 1rem;text-align:right;">
                            <a href="{{ route('post.edit', $post) }}" style="color:#6366f1;text-decoration:none;font-weight:600;">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
