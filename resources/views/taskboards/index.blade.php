@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

    @if (count($taskboards) > 0)
        <ul>
            @foreach ($taskboards as $taskboard)
               <li>{!! link_to_route('taskboardes.show', $taskboard->id, ['id' => $taskboard->id]) !!} : {{ $taskboard->content }}</li>
            @endforeach
        </ul>
    @endif
    {!! link_to_route('taskboards.create', '新規タスクの投稿') !!}
@endsection