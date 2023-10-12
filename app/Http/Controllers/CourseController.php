<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // List courses
        $courses = Course::when(request()->q, function ($courses) {
            $courses = $courses->where('name', 'like', '%' . request()->q . '%');
        })->with('category')->latest()->paginate(5);

        $courses->appends(request()->all());

        $categories = Category::all();

        return Inertia::render('Admin/Courses/Index', [
            'courses' => $courses,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'image'],
            'demo' => ['required', 'string', 'max:255'], // Menambahkan validasi untuk 'demo'
            'discount' => ['required'], // Menambahkan validasi untuk 'discount'
            'price' => ['required'], // Menambahkan validasi untuk 'price'
        ], [
            'category_id.required' => 'The category ID field is required.',
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'thumbnail.required' => 'The thumbnail field is required.',
            'thumbnail.image' => 'The thumbnail must be an image.',
            'demo.required' => 'The demo field is required.', // Pesan untuk 'demo'
            'demo.string' => 'The demo must be a string.',
            'demo.max' => 'The demo may not be greater than 255 characters.',
            'discount.required' => 'The discount field is required.', // Pesan untuk 'discount'
            'price.required' => 'The price field is required.', // Pesan untuk 'price'
        ]);

        // Save thumbnail
        $thumbnail = $request->file('thumbnail');
        $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('images/courses'), $thumbnailName);

        Course::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'thumbnail' => $thumbnailName,
            'description' => $request->description,
            'price' => $request->price,
            'demo' => $request->demo,
            'discount' => $request->discount
        ]);

        return to_route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'demo' => ['required', 'string', 'max:255'], // Menambahkan validasi untuk 'demo'
            'discount' => ['required'], // Menambahkan validasi untuk 'discount'
            'price' => ['required'], // Menambahkan validasi untuk 'price'
        ], [
            'category_id.required' => 'The category ID field is required.',
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'demo.required' => 'The demo field is required.', // Pesan untuk 'demo'
            'demo.string' => 'The demo must be a string.',
            'demo.max' => 'The demo may not be greater than 255 characters.',
            'discount.required' => 'The discount field is required.', // Pesan untuk 'discount'
            'price.required' => 'The price field is required.', // Pesan untuk 'price'
        ]);

        // Jika ada logo yang diunggah, hapus logo lama dan simpan logo baru
        if ($request->hasFile('logo')) {
            // Hapus logo lama
            if ($course->logo) {
                unlink(public_path('images/courses/' . $course->logo));
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('images/courses'), $thumbnailName);

            $course->update([
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'thumbnail' => $thumbnailName,
                'description' => $request->description,
                'price' => $request->price,
                'demo' => $request->demo,
                'discount' => $request->discount
            ]);
        } else {
            $course->update([
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'price' => $request->price,
                'demo' => $request->demo,
                'discount' => $request->discount
            ]);
        }

        return to_route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $thumbnailPath = public_path('images/courses/' . $course->thumbnail);

        // Gunakan perintah `sudo` untuk menghapus file dengan hak akses superuser.
        $command = "rm $thumbnailPath";
        exec($command);

        // Lanjutkan dengan menghapus catatan dari database.
        $course->forceDelete();

        return redirect()->route('courses.index');
    }

    /**
     * Detail data
     * @param Course $course
     */
    public function detail(Course $course)
    {
        $articles = Article::where('course_id', $course->id)->get();

        return Inertia::render('Admin/Courses/Detail', [
            'articles' => $articles,
        ]);
    }
}
