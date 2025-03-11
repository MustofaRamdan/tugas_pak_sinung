@extends('layouts.todolist')

@section('content')
<style>
    .card {
        border: none;
        border-radius: 8px;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .text-muted {
        font-size: 1rem;
        margin-bottom: 0.75rem;
    }

    .badge {
        font-size: 0.75rem;
        padding: 0.4rem 0.6rem;
    }
</style>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Completed Task History</h1>
    <div class="row">
        @foreach($task as $tasks)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body p-2">
                    <h5 class="card-title">{{ $tasks->title }}</h5>
                    <p class="text-muted"><small>Deadline: {{ $tasks->deadline }}</small></p>
                    <span class="badge bg-success">Finish: {{$tasks->selesai}}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
