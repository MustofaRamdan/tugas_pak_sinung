@extends('layouts.todolist')

@section('content')
<style>
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 30px;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .text-muted {
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .btn-sm {
        font-size: 0.8rem;
        padding: 0.5rem 1rem;
    }

    .btn-back {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="text-muted">Deadline: {{ $task->deadline }}</p>
                    <p class="card-text">{{ $task->description ?? 'Tidak ada deskripsi.' }}</p>

                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-back">Kembali</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
