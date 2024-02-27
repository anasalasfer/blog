<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.show', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        $post = new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            //'publisher_id' => Auth::user()->id
            'published_by' =>Auth::user()->name
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post->image = 'images/' . $imageName;
        }

        $post->save();

        return redirect('/posts')->with('success', 'تم نشر المنشور بنجاح');
    }
    //////////////////////////////////////////


    ////////////////////////////////

    public function show()
    {
        $posts = Post::all();
        return view('posts.show', compact('posts'));
    }


public function show1($id)
{
    $post = Post::findOrFail($id);
    
    return view('posts.show1', compact('post'));
}
public function showPost($postId) {
    $post = Post::find($postId);

    // Pass $post and $postId to the view
    return view('posts.show1', ['post' => $post, 'postId' => $postId]);
}


public function about()
{
    return view('posts.about');
}

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post->title = $request->get('title');
        $post->content = $request->get('content');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Delete the old image file if it exists
            if ($post->image) {
                Log::info('Deleted File: ' . public_path($post->image)); // Log deletion
                unlink(public_path($post->image));
            }

            $post->image = 'images/' . $imageName;
        }

        $post->save();

        return redirect('/posts')->with('success', 'تم تحديث المنشور بنجاح');
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Delete the image file if it exists
        if ($post->image) {
            unlink(public_path($post->image));
        }

        // You can perform the delete or use soft delete based on your needs
        $post->delete();

        return redirect('/posts')->with('success', 'تم حذف المنشور بنجاح');
    }
}
