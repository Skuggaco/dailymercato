@extends('admin.layouts.app')

@section('name_page')
    <i class="fa fa-soccer-ball-o"></i> <span class="title-marg">Postes</span>
@endsection

@section('content')
    <div class="box box-primary">
        @include ('admin.partials.tableTitle', ['title' => 'postes', 'controller' => 'Positions'])
        <div class="box-body">
            <table class = "table table-striped table-bordered table-responsive">
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
        </div>
        <div class="box-footer">
            {{ $positions->links() }}
        </div>
    </div>
@endsection