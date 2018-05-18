@extends('layouts.app')

@section('content')

    <h1>id = {{ $taskboard->id }} のタスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $taskboard->id }}</td>
        </tr>
        <tr>
            <th>タイトル</th>
            <td>{{ $taskboard->content }}</td>
        </tr>
        <tr>
            <th>ステータス</th>
            <td>{{ $taskboard->status }}</td>
        </tr>
    </table>
    
     {!! link_to_route('taskboards.edit', 'このタスクを編集', ['id' => $taskboard->id], ['class' => 'btn btn-default']) !!}
     
    {!! Form::model($taskboard, ['route' => ['taskboards.destroy', $taskboard->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection