// resources/views/admin/dashboard.blade.php
@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="mt-6">
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>

    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-2">All Tasks</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($tasks as $task)
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-semibold">{{ $task->title }}</h3>
                    <p class="text-gray-600">By: {{ $task->user->name }}</p>
                    <p class="text-gray-600">{{ $task->description ? Str::limit($task->description, 100) : 'No description' }}</p>
                    <p class="text-sm text-gray-500">Status: {{ ucfirst($task->status) }}</p>
                    <p class="text-sm text-gray-500">Due: {{ $task->due_date ?? 'No due date' }}</p>
                    <div class="mt-2">
                        <a href="{{ route('admin.tasks.show', $task) }}" class="text-blue-500">View</a>
                        <a href="{{ route('admin.tasks.edit', $task) }}" class="text-green-500 ml-2">Edit</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div>
        <h2 class="text-xl font-semibold mb-2">Users</h2>
        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create User</a>
        <table class="w-full bg-white shadow rounded">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">{{ $user->role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
