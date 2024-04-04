<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Role;
use App\Models\User;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'blog_id' => 'required|exists:blogs,id',
        ]);
    
        // Create a new Comment instance
        $comment = new Comment();
        
        // Set attributes for the comment
        $comment->content = $request->content;
        $comment->user_id = auth()->id(); // Assign the authenticated user's ID
        $comment->blog_id = $request->blog_id; // Assign the blog ID
        $comments = Comment::with('user')->get();
    
        // Save the comment
        $comment->save();
    
        // Return back with success message
        return back()->with('success', 'Comment submitted successfully!');
    }
    
}
