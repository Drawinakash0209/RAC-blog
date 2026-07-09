<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\news;
use App\Models\Post;
use App\Models\Event;
use App\Models\Avenue;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\HeroBanner;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use App\Models\MemberOfTheMonth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // Get active hero banners (fallback to empty collection)
        $heroBanners = HeroBanner::getActive();

        // Get site content groups for the home page
        $heroContent = SiteContent::getGroup('hero');
        $themeContent = SiteContent::getGroup('theme_banner');
        $aboutContent = SiteContent::getGroup('about');

        return view('index', [
            'news' => news::all(),
            'avenues' => Avenue::all(),
            'projects' => Project::with('avenues')->latest()->paginate(6),
            'events' => Event::latest()->get(),
            'testimonials' => Testimonial::all(),
            'members' => MemberOfTheMonth::all(),
            'heroBanners' => $heroBanners,
            'heroContent' => $heroContent,
            'themeContent' => $themeContent,
            'aboutContent' => $aboutContent,
        ]);
    }

    public function blog()
    {
        return view('post.blogs', [
            'posts' => Post::latest()->get(),
        ]);
    }

    public function Postindex()
    {
        return view('post.index', [
            'posts' => Post::all(),
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'category' => 'required',
            'slug' => 'nullable|string|max:255',
            'title' => 'required',
            'description' => 'required',
            'coverimage' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'keywords' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $formFields['description'] = $request->description;

        if (str_contains($formFields['description'], 'data:image')) {
            $dom = new DOMDocument();
            @$dom->loadHTML('<?xml encoding="UTF-8">' . $formFields['description']);
            $images = $dom->getElementsByTagName('img');

            foreach ($images as $key => $img) {
                if (strpos($img->getAttribute('src'), 'data:image') !== false) {
                    $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                    $image_name = '/uploads/' . time() . $key . '.png';

                    if (!file_exists(public_path() . '/uploads')) {
                        mkdir(public_path() . '/uploads', 0755, true);
                    }

                    file_put_contents(public_path() . $image_name, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }
            }

            $body = $dom->getElementsByTagName('body')->item(0);
            $html = '';
            foreach ($body->childNodes as $child) {
                $html .= $dom->saveHTML($child);
            }
            $formFields['description'] = $html;
        }

        // Handle cover image with verification
        if($request->hasFile('coverimage')){
            try {
                $file = $request->file('coverimage');
                $filename = $file->store('uploads', 'public');
                
                if (!Storage::disk('public')->exists($filename)) {
                    return back()->withErrors(['coverimage' => 'Failed to save cover image.'])->withInput();
                }
                
                $formFields['coverimage'] = $filename;
            } catch (\Exception $e) {
                return back()->withErrors(['coverimage' => 'Error: ' . $e->getMessage()])->withInput();
            }
        }

        Post::create($formFields);
        return redirect('add-post')->with('message', 'Post Created Successfully!');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'category' => 'required',
            'slug' => 'nullable|string|max:255',
            'title' => 'required',
            'description' => 'required',
            'coverimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'keywords' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $formFields['description'] = $request->description;

        if (str_contains($formFields['description'], 'data:image')) {
            $dom = new DOMDocument();
            @$dom->loadHTML('<?xml encoding="UTF-8">' . $formFields['description']);
            $images = $dom->getElementsByTagName('img');

            foreach ($images as $key => $img) {
                if (strpos($img->getAttribute('src'), 'data:image') !== false) {
                    $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                    $image_name = '/uploads/' . time() . $key . '.png';

                    if (!file_exists(public_path() . '/uploads')) {
                        mkdir(public_path() . '/uploads', 0755, true);
                    }

                    file_put_contents(public_path() . $image_name, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }
            }

            $body = $dom->getElementsByTagName('body')->item(0);
            $html = '';
            foreach ($body->childNodes as $child) {
                $html .= $dom->saveHTML($child);
            }
            $formFields['description'] = $html;
        }

        if($request->hasFile('coverimage')){
            try {
                $post = Post::findOrFail($id);
                
                if ($post->coverimage && Storage::disk('public')->exists($post->coverimage)) {
                    Storage::disk('public')->delete($post->coverimage);
                }
                
                $file = $request->file('coverimage');
                $filename = $file->store('uploads', 'public');
                
                if (!Storage::disk('public')->exists($filename)) {
                    return back()->withErrors(['coverimage' => 'Failed to save cover image.'])->withInput();
                }
                
                $formFields['coverimage'] = $filename;
            } catch (\Exception $e) {
                return back()->withErrors(['coverimage' => 'Error: ' . $e->getMessage()])->withInput();
            }
        }

        Post::findOrFail($id)->update($formFields);
        return redirect('add-post')->with('message', 'Post Updated Successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        if ($post->coverimage && Storage::disk('public')->exists($post->coverimage)) {
            Storage::disk('public')->delete($post->coverimage);
        }
        
        $post->delete();
        return redirect('add-post')->with('message', 'Post Deleted Successfully!');
    }
}