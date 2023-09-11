<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::when(request()->q, function ($categories) {
            $categories = $categories->where('name', 'like', '%' . request()->q . '%');
        })->latest()->paginate(5);

        $categories->appends(request()->all());

        return Inertia::render('Admin/Categories/Index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['required', 'image'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ], [
            'logo.required' => 'The logo field is required.',
            'logo.image' => 'The logo must be an image.',
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
        ]);

        // Save logo
        $logo = $request->file('logo');
        $logoName = time() . '.' . $logo->getClientOriginalExtension();
        $logo->move(public_path('images/categories'), $logoName);

        Category::create([
            'logo' => $logoName,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return to_route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // define category
        $category = Category::find($category->id);

        return Inertia::render('Admin/Categories/Edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'description' => ['string', 'max:255'],
        ], [
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters'
        ]);

        // Jika ada logo yang diunggah, hapus logo lama dan simpan logo baru
        if ($request->hasFile('logo')) {
            // validate
            $request->validate([
                'logo' => ['required', 'image'],
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ], [
                'logo.required' => 'The logo field is required.',
                'logo.image' => 'The logo must be an image.',
                'name.required' => 'The name field is required.',
                'name.string' => 'The name must be a string.',
                'name.max' => 'The name may not be greater than 255 characters.',
                'description.required' => 'The description field is required.',
                'description.string' => 'The description must be a string.',
                'description.max' => 'The description may not be greater than 255 characters.',
            ]);


            // Hapus logo lama
            if ($category->logo) {
                unlink(public_path('images/categories/' . $category->logo));
            }

            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images/categories'), $logoName);

            $category->update([
                'logo' => $logoName,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
            ]);
        } else {
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
            ]);
        }

        return to_route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // delete category and delete logo from images/categories
        unlink(public_path('images/categories/' . $category->logo));
        $category->forceDelete();

        return to_route('categories.index');
    }
}
