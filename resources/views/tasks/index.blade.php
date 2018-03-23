@extends('layouts.app')

@section('content')

    <h1>Todo一覧</h1>

    @if (count($task) > 0)
        <ul>
            @foreach ($task as $task)
                <li>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} : {{ $task->title }}</li>
                <p>{{ $task->content }}</p>
            @endforeach
        </ul>
    @endif
    
        {!! link_to_route('tasks.create', '新規タスクの作成') !!}

@endsection