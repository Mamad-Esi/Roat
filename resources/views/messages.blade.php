<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-5xl mx-auto p-4 sm:p-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-800">
            Messages
        </h1>

        <!-- Refresh Button -->
        <div class="flex gap-4">
            <button id="refreshBtn"
            class="flex items-center justify-center gap-2 bg-blue-600 text-white px-5 py-2.5 rounded-xl shadow-md 
                   hover:bg-blue-700 hover:scale-105 active:scale-95 
                   transition-all duration-200">

            <!-- Spinner -->
            <svg id="spinner" class="hidden w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10"
                        stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg>

            <span id="btnText">Refresh</span>
            
        </button>

        <a href="{{ route('messages.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block mt-2">
            Add Message
        </a>
        </div>
        

    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">Method</th>
                        <th class="px-6 py-4">Content</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($messages as $index => $msg)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $msg->id }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="
                                    px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $msg->method == 'GET' ? 'bg-green-100 text-green-700' : 'bg-purple-100 text-purple-700' }}
                                ">
                                    {{ $msg->method }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                {{ $msg->content }}
                            </td>

                            <td class="px-6 py-4 text-gray-500">
                                {{ $msg->created_at }}
                            </td>

                            <td class="flex gap-3 mt-3">
                                <form action="{{ route('messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Are you Sure?   :)');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                                <a href="{{ route('messages.edit', $msg->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded mr-2">
                                     Edit
                                 </a>
                                 
                            </td>
                        </tr>
                        
                    @endforeach

                    @if(count($messages) == 0)
                        <tr>
                            <td colspan="4" class="text-center py-10 text-gray-400">
                                No messages found
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Script for loading effect -->
<script>
    const btn = document.getElementById('refreshBtn');
    const spinner = document.getElementById('spinner');
    const text = document.getElementById('btnText');

    btn.addEventListener('click', () => {
        spinner.classList.remove('hidden');
        text.textContent = 'Loading...';
        btn.disabled = true;

        setTimeout(() => {
            location.reload();
        }, 600);
    });
</script>

</body>
</html>
