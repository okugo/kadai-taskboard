@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

    @if (count($taskboards) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taskboards as $taskboard)
                    <tr>
                        <td>{!! link_to_route('taskboards.show', $taskboard->id, ['id' => $taskboard->id]) !!}</td>
                        <td>{{ $taskboard->content }}</td>
                        <td>{{ $taskboard->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {!! link_to_route('taskboards.create', '新規タスクの投稿', null, ['class' => 'btn btn-primary']) !!}
@endsection