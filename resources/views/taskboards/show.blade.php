@extends('layouts.app')

@section('content')

    <h1>id = {{ $taskboard->id }} のタスク詳細ページ</h1>

    <p>タスク：{{ $taskboard->content }}</p>
    <p>ステータス：{{ $taskboard->status }}</p>
    
     {!! link_to_route('taskboards.edit', 'このタスクを編集', ['id' => $taskboard->id]) !!}
     
     {!! Form::model($taskboard, ['route' => ['taskboards.destroy', $taskboard->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
     {!! Form::close() !!}

@endsection