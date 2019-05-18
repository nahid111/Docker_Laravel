<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    // for authentication
    public function __construct(){
        $this->middleware('auth', ['except'=>['show']]);
    }





    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('posts.index')->with('posts', $user->posts);
    }



    public function create()
    {
        return view('posts.create');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

         // Handle File Upload
         if($request->hasFile('cover_image')){
             // Get filename with the extension
             $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
             // Get just filename
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             // Get just ext
             $extension = $request->file('cover_image')->getClientOriginalExtension();
             // Filename to store
             $fileNameToStore= $filename.'_'.time().'.'.$extension;
             // Upload Image
             $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
         } else {
             $fileNameToStore = 'noimage.jpg';
         }


        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');

    }



    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }






    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
    }



    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            $post->cover_image = $fileNameToStore;
        }

        $post->save();
        return redirect('/posts')->with('success', 'Post Updated');

    }







    public function destroy($id)
    {
        $post = Post::find($id);
        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        //delete image
        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');

    }
}
