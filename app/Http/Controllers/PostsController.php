<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class PostsController extends Controller
{

    public function __construct(){ // to doesn't display the posting option unless the user is logged in
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        // \App\Models\Post::create($data);
        
        $imagePath = request('image')->store('uploads','public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);  

        return redirect('/profile/'.auth()->user()->id); // going to our authentication user and grapping his/her id
    }

    public function show(\App\Models\Post $post){ // to show the post when we click on it in another page
        return view('posts.show', compact('post'));
    }
}

