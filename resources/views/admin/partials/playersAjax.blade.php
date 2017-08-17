@if(!empty($teams))
    @foreach($teams as $t)
        @foreach($t->players as $k => $p)
        <tr class="div-{{ $t->id }} tr-colored">
            <td class="text-center text-bold">{{ $k+1 }}</td>
            <td></td>
            <td>
                <a href="">
                    <img src="/storage/{{ $p->country->imgCountry }}" alt="" class="flag">
                    {{ $p->getFullNameAttribute() }}
                </a>
            </td>
            @include ('admin.partials.action', ['controller' => 'PlayersController', 'id' => $p->id])
        </tr>
        @endforeach
    @endforeach
@endif