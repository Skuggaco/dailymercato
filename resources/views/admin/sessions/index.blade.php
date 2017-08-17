@extends('admin.layouts.app')

@section('name_page')
    <i class="fa fa-clock-o"></i> <span class="title-marg">Sessions</span>
@endsection

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.tableTitle', ['title' => 'sessions', 'controller' => 'Sessions'])
        <div class="box-body">
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
                    <tr @if($s->on_going == 1) class="on_going" @endif>
                        <td class="text-center">{{ $k+1 }}</td>
                        <td>{{ $s->nameSession }}</td>
                        @include ('admin.partials.action', ['controller' => 'SessionsController', 'id' => $s->id])
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            {{ $sessions->links() }}
        </div>
    </div>
@endsection