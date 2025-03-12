@extends('layouts.todolist')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-5 rounded-4">
        <h1 class="mb-4 text-center text-primary fw-bold">{{ isset($task) ? 'Edit Tugas' : 'Buat Tugas Baru' }}</h1>
        <form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="POST">
            @csrf
            @if (isset($task))
                @method('PUT')
            @endif
            <div class="mb-4">
                <label for="title" class="form-label fw-semibold">Judul</label>
                <input type="text" class="form-control border-primary shadow-sm" id="title" name="title" value="{{ isset($task) ? $task->title : '' }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="form-label fw-semibold">Deskripsi</label>
                <textarea class="form-control border-primary shadow-sm" id="description" name="description" rows="5" placeholder="Tambahkan deskripsi tugas...">{{ isset($task) ? $task->description : '' }}</textarea>
            </div>
            <div class="mb-4">
                <label for="deadline" class="form-label fw-semibold">Deadline</label>
                <input type="date" class="form-control border-primary shadow-sm" id="deadline" name="deadline" value="{{ isset($task) ? $task->deadline : '' }}" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary px-4 py-2">Kembali</a>
                <button type="submit" class="btn btn-primary px-4 py-2"  onclick="confirmEdit(event)">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
    function confirmEdit(event){
        event.preventDefault();
                Swal.fire({
                title: "Success",
                icon: "success",
                draggable: true,
                timer: 3000,
                willClose: () => {
                    event.target.closest("form").submit();
                }
            });
        }
</script>
@endsection
