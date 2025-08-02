<?php


namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->get();
        return view('dashboard', compact('tasks'));
    }

    public function admin()
    {
        $tasks = Task::latest()->get();
        $users = User::all();
        return view('admin.dashboard', compact('tasks', 'users'));
    }
}

