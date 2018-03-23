@extends('layouts.app')

@section('content')

    <h1>タスクリスト： {{ $task->id }} の詳細ページ</h1>
    
    <p>{{ $task->title }}</p>
    
    <p>{{ $task->content }}</p>
    
    <p>{{ $task->status }}</p>
    
    {!! link_to_route('tasks.edit', 'この内容を編集', ['id' => $task->id]) !!}
    
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}


@endsection