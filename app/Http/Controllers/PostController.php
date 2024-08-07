<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\news;
use App\Models\Post;
use App\Models\Event;
use App\Models\Avenue;
use App\Models\Project;
use App\Models\Director;
use App\Models\ExcoMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {return view('index', [
        'news' => news::all(),
        'posts' => Post::latest()->get(),  
        'avenues' => Avenue::all(),
        'excoMembers' => ExcoMember::all(),
        'directors' => Director::all(),
        'projects' => Project::with('avenues')->latest()->paginate(4),
        'events' => Event::latest()->paginate(5),
        'testimonials' => Testimonial::all(),
    ]);
    }

    public function blog()
    {
        return view('post.blogs', [
            'posts' => Post::latest()->get(),
        ]);
    }

    

    
    // public function Postindex()
    // {

    //     $posts = Post::latest()->get();
    //     return view('post.index');
    // }


    
    public function Postindex()
    {return view('post.index', [
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
            'slug' => 'required',
            'title' => 'required',
            'description' => 'required',
            'coverimage' => 'required',
            'keywords' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $formFields['description'] = $request->description;

        $dom = new DOMDocument();
        $dom -> loadHtml($formFields['description'], 9);

        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img){
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/uplade/" . time(). $key . '.png'; 
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);

           }
           $formFields['description'] = $dom->saveHTML();




        if($request->hasFile('coverimage')){
            $formFields['coverimage'] = $request->file('coverimage')->store('uploads', 'public');        
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
            'slug' => 'required',
            'title' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $formFields['description'] = $request->description;

        $dom = new DOMDocument();
        $dom -> loadHtml($formFields['description'], 9);

        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img){
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "uploads" . time(). $key . '.png'; 
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);

           }
           $formFields['description'] = $dom->saveHTML();

        if($request->hasFile('coverimage')){
            $formFields['coverimage'] = $request->file('coverimage')->store('uploads', 'public');        
        }

        Post::findOrFail($id)->update($formFields);

        return redirect('add-post')->with('message', 'Post Updated Successfully!');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('add-post')->with('message', 'Post Deleted Successfully!');
    }


}
