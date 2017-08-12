@extends('admin.layouts.app')

@section('content')
    @include ('admin.partials.title', [
            'title'      => 'Sessions',
            'controller' => 'SessionsController',
            'add'        => 'une session'])

    <table class = "table table-bordered table-responsive">
        <thead>
        <tr>
            <th class="text-center col-md-1">#</th>
            <th class="col-md-8">Session</th>
            <th class="col-md-3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $k => $s)
            <tr>
                <td class="text-center">{{ $k+1 }}</td>
                <td>{{ $s->nameSession }}</td>
                @include ('admin.partials.action', ['controller' => 'SessionsController', 'id' => $s->id])
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $sessions->links() }}
@endsection