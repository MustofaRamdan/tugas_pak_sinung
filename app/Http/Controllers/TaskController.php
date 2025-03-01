<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $tasks = Task::where('user_id', $user)->orderBy('deadline')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Tampilkan form buat tugas
    public function create()
    {
        return view('tasks.create');
    }

    // Simpan tugas baru
    public function store(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
        ]);
        $tugas = new Task();
        $tugas->user_id = $user->id;
        $tugas->title = $request->title;
        $tugas->description = $request->description;
        $tugas->deadline = $request->deadline;
        $tugas->save();
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dibuat!');
    }

    // Tampilkan form edit tugas
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update tugas
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    // Hapus tugas
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus!');
    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);

        Riwayat::create([
            'user_id'     => Auth::id(),
            'title'       => $task->title,
            'description' => $task->description,
            'deadline'    => $task->deadline,
            'selesai'     => now()->format('Y-m-d'),
        ]);

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tugas selesai!');
    }


    public function show(Task $task)
    {

        if ($task->user_id != Auth::id()) {
            return redirect()->route('tasks.index')->with('error', 'Anda tidak memiliki akses ke tugas ini.');
        }

        return view('tasks.detail', compact('task'));
    }



}
