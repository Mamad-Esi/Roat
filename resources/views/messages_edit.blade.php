<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Message</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow w-96">
    <h2 class="text-xl font-bold mb-4 text-center">Edit Message</h2>

    <form action="{{ route('messages.update', $message->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Content</label>
            <input type="text" name="content" 
                   class="w-full border rounded px-3 py-2"
                   value="{{ $message->content }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Method</label>
            <select name="method" class="w-full border rounded px-3 py-2">
                <option value="GET" {{ $message->method == 'GET' ? 'selected' : '' }}>GET</option>
                <option value="POST" {{ $message->method == 'POST' ? 'selected' : '' }}>POST</option>
            </select>
        </div>

        <button type="submit"
                class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
            Update Message
        </button>
    </form>
</div>

</body>
</html>
