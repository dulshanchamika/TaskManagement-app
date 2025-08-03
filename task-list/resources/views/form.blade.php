@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
  <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
      {{ isset($task) ? 'Edit Task' : 'Add New Task' }}
    </h2>

    <form method="POST"
      action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
      @csrf
      @isset($task)
        @method('PUT')
      @endisset

      <div class="mb-4">
        <label for="title" class="block font-semibold text-gray-700 mb-1">Title</label>
        <input type="text" name="title" id="title"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 @error('title') border-red-500 @enderror"
          value="{{ $task->title ?? old('title') }}" />
        @error('title')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="description" class="block font-semibold text-gray-700 mb-1">Description</label>
        <textarea name="description" id="description" rows="5"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 @error('description') border-red-500 @enderror">{{ $task->description ?? old('description') }}</textarea>
        @error('description')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="long_description" class="block font-semibold text-gray-700 mb-1">Long Description</label>
        <textarea name="long_description" id="long_description" rows="8"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 @error('long_description') border-red-500 @enderror">{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center gap-4">
        <button type="submit"
          class="px-6 py-2 bg-pink-500 text-white rounded-lg shadow hover:bg-pink-600 transition">
          @isset($task)
            Update Task
          @else
            Add Task
          @endisset
        </button>
        <a href="{{ route('tasks.index') }}"
          class="text-gray-600 hover:text-pink-500 transition underline">
          Cancel
        </a>
      </div>
    </form>
  </div>
@endsection
