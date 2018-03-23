@extends('layouts.app')

@section('content')

    <h1>新規タスク作成ページ</h1>

    {!! Form::model($task, ['route' => 'tasks.store']) !!}

        {!! Form::label('title', 'タイトル:') !!}
        {!! Form::text('title') !!}
        
        {!! Form::label('content', '内容:') !!}
        {!! Form::text('content') !!}
        
        {!! Form::label('status','status:')!!}
        {!! Form::text('status')!!}

        {!! Form::submit('保存') !!}

    {!! Form::close() !!}

@endsection