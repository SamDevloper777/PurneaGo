<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">
    <div class="mx-auto px-10 md:px-24 py-8">
        <h1 class="md:text-xl text-lg font-semibold text-slate-500 mb-8 border-s-4 border-s-blue-400 pl-3">
            Edit Category
        </h1>
    
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
    
            <!-- Parent ID -->
            <div class="mb-4">
                <label for="parent_id" class="block text-gray-700 font-medium mb-2">Parent ID</label>
                <input type="number" name="parent_id" id="parent_id" value="{{ $category->parent_id }}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Parent ID">
            </div>
    
            <!-- Level -->
            <div class="mb-4">
                <label for="level" class="block text-gray-700 font-medium mb-2">Level</label>
                <input type="number" name="level" id="level" value="{{ $category->level }}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Level">
            </div>
    
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Category Name" required>
            </div>
    
            <!-- Order Level -->
            <div class="mb-4">
                <label for="order_level" class="block text-gray-700 font-medium mb-2">Order Level</label>
                <input type="number" name="order_level" id="order_level" value="{{ $category->order_level }}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Order Level">
            </div>
    
            <!-- Banner -->
            <div class="mb-4">
                <label for="banner" class="block text-gray-700 font-medium mb-2">Banner</label>
                <input type="file" name="banner" id="banner" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if($category->banner)
                    <img src="{{ asset('storage/' . $category->banner) }}" alt="Banner" class="mt-2 h-20 border rounded-lg">
                @endif
            </div>
    
            <!-- Icon -->
            <div class="mb-4">
                <label for="icon" class="block text-gray-700 font-medium mb-2">Icon</label>
                <input type="file" name="icon" id="icon" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if($category->icon)
                    <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" class="mt-2 h-20 border rounded-lg">
                @endif
            </div>
    
            <!-- Cover Image -->
            <div class="mb-4">
                <label for="cover_image" class="block text-gray-700 font-medium mb-2">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if($category->cover_image)
                    <img src="{{ asset('storage/' . $category->cover_image) }}" alt="Cover Image" class="mt-2 h-20 border rounded-lg">
                @endif
            </div>
    
            <!-- Featured -->
            <div class="mb-4">
                <label for="featured" class="block text-gray-700 font-medium mb-2">Featured</label>
                <select name="featured" id="featured" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="0" {{ $category->featured == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $category->featured == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
    
            <!-- Slug -->
            <div class="mb-4">
                <label for="slug" class="block text-gray-700 font-medium mb-2">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ $category->slug }}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Slug">
            </div>
    
            <!-- Meta Title -->
            <div class="mb-4">
                <label for="meta_title" class="block text-gray-700 font-medium mb-2">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ $category->meta_title }}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Meta Title">
            </div>
    
            <!-- Meta Description -->
            <div class="mb-4">
                <label for="meta_description" class="block text-gray-700 font-medium mb-2">Meta Description</label>
                <textarea name="meta_description" id="meta_description" class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Meta Description" rows="4">{{ $category->meta_description }}</textarea>
            </div>
    
            <!-- Submit Button -->
            <div class="mt-6 text-center">
                <button type="submit" class="bg-blue-500 text-white px-12 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Update Category
                </button>
            </div>
        </form>
    </div>
    
</body>
</html>