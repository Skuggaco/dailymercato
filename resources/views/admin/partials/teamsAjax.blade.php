@if(!empty($teams))
    @foreach($teams as $k => $t)
        <tr class="div-{{ $l->id }} tr-colored">
            <td class="text-center text-bold">{{ $k+1 }}</td>
            <td></td>
            <td>
                <a href="{{ action('Backend\TeamsController@show', $t->slugTeam) }}">
                    <img src="/storage/{{ $t->imgTeam }}" alt="" class="logo">
                    {{ $t->nameLongTeam }} ({{ $t->nameTeam }})
                </a>
            </td>
            @include ('admin.partials.action', ['controller' => 'TeamsController', 'id' => $t->id])
        </tr>
    @endforeach
@endif