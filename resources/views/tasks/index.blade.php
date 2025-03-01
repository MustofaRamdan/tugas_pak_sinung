@extends('layouts.todolist')

@section('content')
<style>
    .card {
        border: none;
        border-radius: 8px;
        transition: transform 0.2s, box-shadow 0.2s;
        width: 100%;
        max-width: 320px;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .text-muted {
        font-size: 1rem;
        margin-bottom: 0.75rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .d-flex {
        margin-top: 0.5rem;
        gap: 5px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-sm {
        font-size: 0.75rem;
        padding: 0.5rem 0.7rem;
    }

    .badge {
        font-size: 0.75rem;
        padding: 0.4rem 0.6rem;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Tugas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container-fluid">
                        <div class="text-center mb-4">
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Buat Tugas Baru</a>
                        </div>

                        <div class="row">
                            @foreach ($tasks as $task)
                                <div class="col-md-4 mb-3">
                                    <div class="card shadow-sm square-card">
                                        <div class="card-body p-2 d-flex flex-column justify-content-between">
                                            <div>
                                                <h5 class="card-title mb-1">{{ $task->title }}</h5>
                                                <p class="text-muted mb-2"><small>Deadline: {{ $task->deadline }}</small></p>
                                            </div>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success">Selesai</button>
                                                    </form>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
