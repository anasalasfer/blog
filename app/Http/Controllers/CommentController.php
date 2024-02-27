<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    
public function showComments($postId)
{
    $post = Post::with('comments')->find($postId);

    // تأكد من أن المنشور موجود
    if (!$post) {
        abort(404); // أو قم بالتعامل مع الحالة عندما لا يتم العثور على المنشور
    }

    return view('posts.showComments', ['post' => $post]);
}
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        $post->comments()->create($request->all());

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
    public function destroy(Post $post, Comment $comment)
    {
        // تأكد من أن التعليق ينتمي إلى المنشور
        if ($post->comments->contains($comment)) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        } else {
            abort(404); // يمكنك التعامل مع حالة عدم وجود التعليق حسب احتياجاتك
        }
    }

}

