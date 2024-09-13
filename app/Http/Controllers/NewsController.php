<?php

    namespace Controllers;

    use App\Models\news;
    use DOMDocument;
    use Illuminate\Http\Request;

    class NewsController extends Controller
    {


        public function index()
        {return view('news.index', [
            'news' => news::all(),
        ]);
        }

        // Show the news
        public function show(news $new)
        {
        return view('news.show', compact('new'));
        }

    

        public function create()
        {
            return view('news.create');
        }

        // Edit the news
        public function edit(news $new)
        {
            return view('news.edit', [
                'new' => $new,
            ]);
        }



        // Store the news
        public function store(Request $request)
        {
            $formFields = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'required',
            ]);

            $formFields['description'] = $request->description;

            $dom = new DOMDocument();
            $dom -> loadHtml($formFields['description'], 9);

            $images = $dom->getElementsByTagName('img');

            foreach($images as $key => $img){
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/new/" . time(). $key . '.png'; 
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);

            }
            $formFields['description'] = $dom->saveHTML();




            if($request->hasFile('coverimage')){
                $formFields['coverimage'] = $request->file('coverimage')->store('uploads', 'public');        
            }

            if($request->hasFile('image')){
                $formFields['image'] = $request->file('image')->store('news', 'public');        
            }

            news::create($formFields);

            return redirect('news')->with('message', 'News Created Successfully!');
        }

        // Update the news
        public function update(Request $request, news $new)
        {
            $formFields = $request->validate([
                'title' => 'required',
                'description' => 'required',
                
            ]);

            $formFields['description'] = $request->description;

            $dom = new DOMDocument();
            $dom -> loadHtml($formFields['description'], 9);

            $images = $dom->getElementsByTagName('img');

            foreach($images as $key => $img){
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/new/" . time(). $key . '.png'; 
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);

            }
            $formFields['description'] = $dom->saveHTML();

            if($request->hasFile('image')){
                $formFields['image'] = $request->file('image')->store('news', 'public');        
            }

            $new->update($formFields);

            return redirect('news')->with('message', 'News Updated Successfully!');
        }

        // Delete the news
        public function destroy(news $new)
        {
            $new->delete();

            return redirect('news')->with('message', 'News Deleted Successfully!');
        }
        
    }
