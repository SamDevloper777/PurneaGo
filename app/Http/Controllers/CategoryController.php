<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function create()
    {
        return view('Admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'parent_id' =>  'nullable|integer',
            'level' => 'nullable|integer',
            'name' => 'required|string|max:50',
            'order_level' => 'nullable|integer',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'featured' =>  'nullable|boolean',
            'slug' => 'nullable|unique:categories,slug',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $bannerPath = $request->hasFile('banner') ? $request->file('banner')->store('categories/banners', 'public') : null;
        $iconPath = $request->hasFile('icon') ? $request->file('icon')->store('categories/icons', 'public') : null;
        $coverImagePath = $request->hasFile('cover_image') ? $request->file('cover_image')->store('categories/covers', 'public') : null;

        Category::create([
            'parent_id' => $request->parent_id ?? 0,
            'level' => $request->level ?? 0,
            'name' => $request->name,
            'order_level' => $request->order_level ?? 0,
            'banner' => $bannerPath,
            'icon' => $iconPath,
            'cover_image' =>  $coverImagePath,
            'featured' => $request->featured ?? 0,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->name),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->route('admin.categories.create')->with('success', 'Category created successfully.');
    }

    public function index()
    {
        $categories = Category::all();
        return view('Admin.category.manage', compact('categories'));
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'parent_id' => 'nullable|integer',
            'level' => 'nullable|integer',
            'name' => 'required|string|max:50',
            'order_level' => 'nullable|integer',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'featured' => 'nullable|boolean',
            'slug' => 'nullable|unique:categories,slug,' . $id,
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);

        $bannerPath = $request->hasFile('banner') ? $request->file('banner')->store('categories/banners', 'public') : $category->banner;
        $iconPath = $request->hasFile('icon') ? $request->file('icon')->store('categories/icons', 'public') : $category->icon;
        $coverImagePath = $request->hasFile('cover_image') ? $request->file('cover_image')->store('categories/covers', 'public') : $category->cover_image;

        $category->update([
            'parent_id' => $request->parent_id ?? $category->parent_id,
            'level' => $request->level ?? $category->level,
            'name' => $request->name,
            'order_level' => $request->order_level ?? $category->order_level,
            'banner' => $bannerPath,
            'icon' => $iconPath,
            'cover_image' => $coverImagePath,
            'featured' => $request->featured ?? $category->featured,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->name),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->route('admin.categories.manage')->with('success', 'Category updated successfully.');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.manage')->with('success', 'Category deleted successfully.');
    }
}
