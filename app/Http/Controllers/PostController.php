<?php

namespace App\Http\Controllers;

use App\Post;
use App\Posts\PostCreated;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        event(new PostCreated($posts));
        $data['posts'] = $posts;
        return view('posts.index', $data);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:5',
            'post_image' => 'required|mimes:pdf'
        ]);

        $file = $request->file('post_image');
        $path = public_path('images/') ;
        $file->move($path, $file->getClientOriginalName());
        //        $post = Post::storePost($request->title, $request->input('content'));

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'user_id' => Auth::id()
        ]); //Mass assignment

        return redirect('posts');
    }

    public function view($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $post = Post::find($id);
        $data['post'] = $post;
        return view('posts.view', $data);
    }

    public function edit($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $post = Post::find($id);
        $data['post'] = $post;
        return view('posts.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:5',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();

        return redirect('posts/edit/'.$post->id);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        //Post::destroy($id);
        return redirect('posts/');
    }
}
