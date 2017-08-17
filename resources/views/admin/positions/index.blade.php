@extends('admin.layouts.app')

@section('content')
    @include ('admin.partials.title', [
            'title'      => 'Postes',
            'controller' => 'PositionsController',
            'add'        => 'un poste'])

    <table class = "table table-bordered table-responsive">
        <thead>
        <tr>
            <th class="text-center col-md-1">#</th>
            <th class="col-md-8">Poste</th>
            <th class="col-md-3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($positions as $k => $p)
            <tr>
                <td class="text-center">{{ $k+1 }}</td>
                <td>{{ $p->nameLongPosition }}  ({{ $p->namePosition }})</td>
                @include ('admin.partials.action', ['controller' => 'PositionsController', 'id' => $p->id])
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $positions->links() }}
@endsection