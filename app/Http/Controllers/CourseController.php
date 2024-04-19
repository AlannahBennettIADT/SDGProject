<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->has('search')) {
            $search = $request->input('search');
            // Perform search query
            $courses = Course::where('title', 'like', '%' . $search . '%')
                             ->paginate(10);
        } else {
            // Fetch all courses
            $courses = Course::paginate(10);
        }
        return view('courses.index', compact('courses'));
    }

    /**
     * Search for courses.
     */
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255', // Validate search input
        ]);

        $search = $request->input('search');
        $courses = Course::where('title', 'like', '%' . $search . '%')
                         ->paginate(10); // Paginate search results
        return view('courses.index', compact('courses', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    //this is for saving to profile/ applying
    public function apply($id)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();
            
            // Get the course ID from the route parameters
            $courseId = $id;
    
            // Check if the relationship already exists
            if (!$user->applied_courses()->where('course_id', $courseId)->exists()) {
                // If it doesn't exist, attach the course
                $user->applied_courses()->attach($courseId);
    
                // Redirect the user to their profile or any other appropriate page
                return redirect()->route('profiles.index', $user->id)->with('success', 'You have successfully applied to the course.');
            } else {
                // If the relationship already exists, redirect with a message
                return redirect()->route('courses.show', $courseId)->with('error', 'You have already applied to this course.');
            }
        } else {
            // If the user is not authenticated, redirect them to the login page
            return redirect()->route('login')->with('error', 'Please login to apply to the course.');
        }
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

     //removing course from profile
    public function remove($id)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();
    
            // Detach the course from the user's applied courses
            $user->applied_courses()->detach($id);
    
            // Redirect the user to the course show page with a success message
            return redirect()->route('courses.show', $id)->with('success', 'Course removed successfully.');
        } else {
            // If the user is not authenticated, redirect them to the login page
            return redirect()->route('login')->with('error', 'Please login to remove the course.');
        }
    }
}

