@extends('layouts.todolist')

@section('content')
<div class="container">
    <h1>{{ isset($task) ? 'Edit Tugas' : 'Buat Tugas Baru' }}</h1>
    <form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="POST">
        @csrf
        @if (isset($task))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ isset($task) ? $task->title : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description">{{ isset($task) ? $task->description : '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ isset($task) ? $task->deadline : '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
