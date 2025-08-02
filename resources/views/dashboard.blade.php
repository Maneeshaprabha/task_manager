// resources/views/dashboard.blade.php
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mt-6">
    <h1 class="text-2xl font-bold mb-4">My Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Task</a>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($tasks as $task)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">{{ $task->title }}</h3>
                <p class="text-gray-600">{{ $task->description ? Str::limit($task->description, 100) : 'No description' }}</p>
                <p class="text-sm text-gray-500">Status: {{ ucfirst($task->status) }}</p>
                <p class="text-sm text-gray-500">Due: {{ $task->due_date ?? 'No due date' }}</p>
                <div class="mt-2">
                    <a href="{{ route('tasks.show', $task) }}" class="text-blue-500">View</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="text-green-500 ml-2">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
