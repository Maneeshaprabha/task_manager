@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
<div class="mt-6">
    <h1 class="text-2xl font-bold mb-4">All Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="mb-4 inline-block bg-green-500 text-white px-4 py-2 rounded">+ Create New Task</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->count())
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Due Date</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td class="border px-4 py-2">{{ $task->title }}</td>
                        <td class="border px-4 py-2 capitalize">{{ str_replace('_', ' ', $task->status) }}</td>
                        <td class="border px-4 py-2">{{ $task->due_date }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('tasks.show', $task) }}" class="text-blue-500">View</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="text-yellow-500">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">No tasks found.</p>
    @endif
</div>
@endsection
