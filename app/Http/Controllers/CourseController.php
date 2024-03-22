<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

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
        $course = Course::findOrFail($id); // Retrieve the course by its ID or throw a 404 error if not found
        return view('courses.show', compact('course'));
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
    public function destroy(string $id)
    {
        //
    }
}

