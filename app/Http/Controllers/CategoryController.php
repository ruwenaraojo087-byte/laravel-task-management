<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return back()->with('success', 'Category created successfully!');
    }

    public function destroy(Category $category)
    {
        // Optionally reassign tasks to 'Uncategorized' or delete them
        $category->delete();
        return back()->with('success', 'Category deleted successfully!');
    }
}
