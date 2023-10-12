<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();

        return Inertia::render('Admin/Articles/Create', [
            'courses' => $courses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'course_id' => ['required'],
            'episode' => ['required', 'integer', 'max:255'], // Menambahkan validasi untuk 'demo'
            'name' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'status' => ['required', 'string'], // Menambahkan validasi untuk 'discount'
        ], [
            'category_id.required' => 'The category ID field is required.',
            'episode.required' => 'The price field is required.', // Pesan untuk 'price'
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'content.required' => 'The description field is required.',
            'status.required' => 'The discount field is required.', // Pesan untuk 'discount'
        ]);


        Article::create([
            'course_id' => $request->course_id,
            'episode' => $request->episode,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return to_route('courses.detail', ['id' => $request->course_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
