<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{

    //gathers all blog models and returns them to index view
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }


    //returns create blog view
    public function create()
    {
        return view('blogs.create');
    }


    //storing blogs w images
    public function store(Request $request)
    {
            // Validate the request data
            $validatedData = $request->validate([
                // Your validation rules here
                'blog_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rule for image uploads
            ]);

            // Handle image upload
            if ($request->hasFile('blog_image')) {
                $imagePath = $request->file('blog_image')->store('public/images');
                $imagePath = str_replace('public/', '', $imagePath);
            } else {
                $imagePath = null;
            }

            // Create a new blog entry with the provided data
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->genre = $request->genre;
            $blog->author = $request->author;
            $blog->tags = $request->tags;
            $blog->publish_date = $request->publish_date;
            $blog->blog_image = $imagePath; // Store the image path in the database
            $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
     }



    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}

