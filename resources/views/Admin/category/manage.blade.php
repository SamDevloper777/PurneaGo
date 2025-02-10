<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">
    <div class="flex gap-3 mt-5 px-[2%] flex-row justify-between items-center">
        <h1 class="md:text-xl text-lg font-semibold  text-slate-500 border-s-4 border-s-blue-400 pl-3">Category Management</h1>
        <div class="inline-flex flex-row  md:items-center gap-2">
        <a href="{{ route('admin.categories.create') }}" class="px-3 py-2 bg-blue-500 rounded-lg text-white self-start">Create New
            Category</a>
        </div>

    </div>
    <div class="p-4 overflow-x-auto">
        <table class="min-w-full bg-white mt-4 ">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 ">ID</th>
                    <th class="py-2 px-4 ">Name</th>
                    <th class="py-2 px-4 ">Parent Id</th>
                    <th class="py-2 px-4 ">Level</th>
                    <th class="py-2 px-4 ">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="border-b border-gray-300 ">
                        <td class="py-2 px-4 text-center">{{ $category->id }}</td>
                        <td class="py-2 px-4 text-center">{{ $category->name }}</td>
                        <td class="py-2 px-4 text-center">{{ $category->parent_id }}</td>
                        <td class="py-2 px-4 text-center">{{ $category->level }}</td>
                        <td class="p-3 flex gap-2 justify-center items-center">
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                class="px-4 py-2 bg-green-500 text-white rounded-md">Edit</a>
                            <a href="{{ route('admin.categories.show', $category->id) }}"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md">show</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 bg-red-600 text-white rounded-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
