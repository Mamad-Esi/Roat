<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Message</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow w-96">
    <h2 class="text-xl font-bold mb-4 text-center">Create Message</h2>

    <form action="{{ route('messages.store.form') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Content</label>
            <input type="text" name="content"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Method</label>
            <select name="method" class="w-full border rounded px-3 py-2">
                <option value="GET">GET</option>
                <option value="POST">POST</option>
            </select>
        </div>

        <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
            Save Message
        </button>
    </form>
</div>

</body>
</html>
