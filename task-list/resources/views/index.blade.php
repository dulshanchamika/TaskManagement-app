@extends('layouts.app')

@section('title', 'Task List App')

@section('content')

    <nav class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Your Task List</h1>
        <a href="{{ route('tasks.create') }}"
            class="inline-block px-4 py-2 bg-pink-500 text-white font-semibold rounded-lg shadow hover:bg-pink-600 transition">
            + Add Task
        </a>
    </nav>

    <div class="space-y-4">
        @forelse ($tasks as $task)
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                class="block p-4 bg-white shadow rounded-lg hover:bg-gray-50 transition group">
                <div
                    class="text-lg font-medium text-gray-800 group-hover:underline @if($task->completed) line-through text-gray-400 @endif">
                    {{ $task->title }}
                </div>
            </a>
        @empty
            <div class="p-6 text-center text-gray-500 bg-white shadow rounded-lg">
                No tasks available. Why not create one?
            </div>
        @endforelse
    </div>

    @if ($tasks->count())
        <nav class="mt-6">
            {{ $tasks->links('pagination::tailwind') }}
        </nav>
    @endif

@endsection
