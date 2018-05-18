@extends('layouts.app')

@section('content')

    <h1>id: {{ $taskboard->id }} のタスク編集ページ</h1>

    {!! Form::model($taskboard, ['route' => ['taskboards.update', $taskboard->id], 'method' => 'put']) !!}

        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}

@endsection