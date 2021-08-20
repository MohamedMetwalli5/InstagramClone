<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user){
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',

        ]);


        if(request('image')){ //in case the user pressed on the save button without choosing any image so we keep the old image
            $imagePath = request('image')->store('profile','public');
        
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(900, 900);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        // dd($data);

        auth()->user()->profile->update(array_merge(
            $data, $imageArray ?? []
        )); // an extra layer of protection

        return redirect("/profile/{$user->id}");

    }
}
