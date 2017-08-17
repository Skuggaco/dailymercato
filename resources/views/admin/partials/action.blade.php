<td class="action">
    <div class="col-xs-1">
    @if(!isset($transfer->activeTransfer) or $transfer->activeTransfer == 1)
    <a href="{{ action('Backend\\'.$controller.'@edit', [$id]) }}">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </a>
    @endif
    </div>
    <div class="col-xs-9">
    {{ Form::open([ 'method'  => 'delete', 'action' => ['Backend\\'.$controller.'@destroy', $id] ]) }}
        {{ Form::submit('Supprimer', ['class' => 'btn btn-sm btn-danger btn-delete delete']) }}
    {{ Form::close() }}
    </div>
</td>