<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:categories,name'],
        ]);

        $saved = Category::create([
            'name'  => $request->name,
        ]);

        return back()->with('success', 'Category Berhasil Ditambahkan');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required',Rule::unique('categories', 'name')->ignore($category->id),],
        ]);

        $category->update([
            'name'  => $request->name,
        ]);

        return back()->with('success', 'Category Berhasil Diupdate');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Category Berhasil Dihapus');
    }
}
