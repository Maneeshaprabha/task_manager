@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="mt-6 max-w-lg">
    <h1 class="text-2xl font-bold mb-4">{{ $task->title }}</h1>

    <p class="mb-2"><strong>Description:</strong> {{ $task->description }}</p>
    <p class="mb-2"><strong>Status:</strong> {{ ucwords(str_replace('_', ' ', $task->status)) }}</p>
    <p class="mb-4"><strong>Due Date:</strong> {{ $task->due_date }}</p>

    <div class="space-x-2">
        <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
        <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
    </div>
</div>
@endsection
