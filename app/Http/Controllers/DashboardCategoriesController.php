<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DashboardCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard Categories',
            'categories' => Category::paginate(10),
        ];

        return view('dashboard.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Category',
        ];

        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'required|string|max:255'
        ]);
        Category::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category berhasil di buat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        $data = [
            'title' => 'Edit Category: ' . $category->name,
            'category' => $category,
        ];
        return view('dashboard.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $rules = [
            'description' => 'required|string|max:255',
            'name' => 'required|string|max:255|unique:categories',
        ];

        if ($request->name == $category->name) {
            $rules['name'] = 'required|string|max:255';
        }

        $validatedData = $request->validate($rules);

        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        $Category->delete();

        return redirect()->route('categories.index')->with('success', 'Category berhasil dihapus.');
    }
}
