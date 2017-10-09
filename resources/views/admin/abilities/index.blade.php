@extends('admin.layouts.app')

@section('name_page')
    <i class="fa fa-briefcase"></i> <span class="title-marg">Aptitudes</span>
@endsection
@section('content')
    <div class="box box-primary">
        @include ('admin.partials.tableTitle', ['title' => 'Aptitudes', 'controller' => 'Abilities'])
        <div class="box-body">
            <table class = "table table-striped table-bordered table-responsive">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($abilities as $k => $a)
                    <tr>
                        <td class="text-center">{{ $k+1 }}</td>
                        <td>
                            {{ $a->name }}
                        </td>
                        @include ('admin.partials.action', ['controller' => 'AbilitiesController', 'id' => $a->id])
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            {{ $abilities->links() }}
        </div>
    </div>
@endsection