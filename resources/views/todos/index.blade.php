<x-app-layout>
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-blue-500 to-blue-700 text-white">
                    <div class="flex justify-between items-center">
                        <h2 class="text-3xl font-bold">Todo List</h2>
                        <a href="{{ route('todos.create') }}" 
                           class="bg-yellow-400 hover:bg-yellow-300 text-gray-800 font-semibold py-2 px-4 rounded shadow-lg transition duration-300">
                            + Add New Todo
                        </a>
                    </div>
                </div>

                <div class="p-6">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 shadow">
                            {{ session('success') }}
                        </div>
                    @endif

                    @php
                        $todos = \App\Models\Todo::all();
                    @endphp

                    @if($todos->isEmpty())
                        <div class="text-center p-6 bg-yellow-50 border border-yellow-300 text-yellow-700 rounded-lg shadow">
                            <p class="text-lg">No todos found. 
                                <a href="{{ route('todos.create') }}" class="text-blue-500 hover:underline">
                                    Add a new todo
                                </a>.
                            </p>
                        </div>
                    @else
                        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($todos as $todo)
                                <div class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition duration-300">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $todo->title }}</h3>
                                        <p class="text-gray-600 mt-2">{{ $todo->description }}</p>
                                    </div>
                                    <div class="border-t border-gray-200 flex justify-between items-center p-4 bg-gray-50">
                                        <a href="{{ route('todos.edit', $todo) }}" 
                                           class="text-yellow-500 hover:text-yellow-600 font-medium transition">
                                            ✏️ Edit
                                        </a>
                                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-500 hover:text-red-600 font-medium transition"
                                                    onclick="return confirm('Are you sure?')">
                                                🗑️ Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
