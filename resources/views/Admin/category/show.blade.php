<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="p-4 flex flex-col">
        <div class="flex gap-3 my-5 flex-row justify-between items-center">
            <div class="flex flex-1 flex-col border-s-4 border-s-blue-400 pl-3">
                <h2 class="md:text-xl text-lg font-semibold  text-slate-500 ">View Category</h2>
                <p class="text-sm text-slate-400 font-normal">Category Details</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md">Edit</a>
                <a href="{{ route('admin.categories.manage') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Back</a>
            </div>
            
        </div>

        <!-- Responsive Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 ">
            <!-- Parent ID -->
            <div class="bg-slate-100 p-3 rounded  bg-gray-50 ">
                <strong class="block text-lg font-semibold text-slate-600">Parent ID</strong>
                <span class="text-slate-500">{{ $category->parent_id ?? 'N/A' }}</span>
            </div>

            <!-- Level -->
            <div class="bg-slate-100 p-3 rounded bg-gray-50">
                <strong class="block text-lg font-semibold text-slate-600">Level</strong>
                <span class="text-slate-500">{{ $category->level ?? 'N/A' }}</span>
            </div>

            <!-- Name -->
            <div class="bg-slate-100 p-3 rounded bg-gray-50">
                <strong class="block text-lg font-semibold text-slate-600">Name</strong>
                <span class="text-slate-500">{{ $category->name }}</span>
            </div>

            <!-- Order Level -->
            <div class="bg-slate-100 p-3 rounded bg-gray-50">
                <strong class="block text-lg font-semibold text-slate-600">Order Level</strong>
                <span class="text-slate-500">{{ $category->order_level ?? 'N/A' }}</span>
            </div>

            <!-- Banner -->
            <div class="bg-slate-100 p-3 rounded bg-gray-50 ">
                <strong class="block text-lg font-semibold text-slate-600">Banner</strong>
                @if($category->banner)
                    <img src="{{ asset('storage/' . $category->banner) }}" alt="Banner" class="w-24 h-24 object-cover border">
                @else
                    <span class="text-slate-500">No banner available</span>
                @endif
            </div>

            <!-- Icon -->
            <div class="bg-slate-100 p-3 rounded bg-gray-50">
                <strong class="block text-lg font-semibold text-slate-600">Icon</strong>
                @if($category->icon)
                    <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" class="w-24 h-24 object-cover border">
                @else
                    <span class="text-slate-500">No icon available</span>
                @endif
            </div>

            <!-- Cover Image -->
            <div class="bg-slate-100 p-3 rounded bg-gray-50">
                <strong class="block text-lg font-semibold text-slate-600">Cover Image</strong>
                @if($category->cover_image)
                    <img src="{{ asset('storage/' . $category->cover_image) }}" alt="Cover Image" class=" w-24 h-24 object-cover border">
                @else
                    <span class="text-slate-500">No cover image available</span>
                @endif
            </div>

            <!-- Slug -->
            <div class="bg-slate-100 p-3 rounded  bg-gray-50">
                <strong class="block text-lg font-semibold text-slate-600">Slug</strong>
                <span class="text-slate-500">{{ $category->slug ?? 'N/A' }}</span>
            </div>

            <!-- Featured -->
            <div class="bg-slate-100 p-3 rounded bg-gray-50">
                <strong class="block text-lg font-semibold text-slate-600">Featured</strong>
                <span class="text-slate-500">{{ $category->featured ? 'Yes' : 'No' }}</span>
            </div>

            <!-- Meta Title -->
            <div class="bg-slate-100 p-3 rounded bg-gray-50">
                <strong class="block text-lg font-semibold text-slate-600">Meta Title</strong>
                <span class="text-slate-500">{{ $category->meta_title ?? 'N/A' }}</span>
            </div>

            <!-- Meta Description -->
            <div class="bg-slate-100 p-3 rounded bg-gray-50">
                <strong class="block text-lg font-semibold text-slate-600">Meta Description</strong>
                <span class="text-slate-500">{{ $category->meta_description ?? 'N/A' }}</span>
            </div>
        </div>
    </div>
</body>
</html>
