@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-6">
        <a href="{{ route('tasks.index') }}" class="link">&larr; Go back to the task list</a>
    </div>

    <div class="mb-4 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $task->title }}</h2>

        <p class="text-gray-700 mb-3">{{ $task->description }}</p>

        @if ($task->long_description)
            <p class="text-gray-600 mb-3">{{ $task->long_description }}</p>
        @endif

        <p class="text-sm text-gray-500">
            Created {{ $task->created_at->diffForHumans() }} &bull; Updated {{ $task->updated_at->diffForHumans() }}
        </p>

        <p class="mt-3">
            @if ($task->completed)
                <span class="inline-block bg-green-100 text-green-700 text-sm font-medium px-3 py-1 rounded-full">Completed</span>
            @else
                <span class="inline-block bg-red-100 text-red-700 text-sm font-medium px-3 py-1 rounded-full">Not Completed</span>
            @endif
        </p>
    </div>

    <div class="mt-6 flex flex-wrap gap-3">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}"
           class="btn bg-blue-500 hover:bg-blue-600 text-white">
            Edit
        </a>

        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit"
                    class="btn bg-yellow-500 hover:bg-yellow-600 text-white">
                Mark as {{ $task->completed ? 'Not Completed' : 'Completed' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete this task?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn bg-red-500 hover:bg-red-600 text-white">
                Delete
            </button>
        </form>
    </div>
@endsection
