@php($link = '/storage/logo/countries/')
<div class="rankdis">
    @php($url = collect(request()->segments())->last())
    <a class="lil @if($url == $get) activ @endif" href="/{{ $get }}/">Tout</a>
    <a class="lil @if($url == 'premier-league') activ @endif" href="/{{ $get }}/premier-league">
        <img class="logoflag" src="{{ $link }}angleterre.svg">
        <span class="onlydesk nextTo-logo">Premier League</span>
    </a>
    <a class="lil @if($url == 'laliga') activ @endif" href="/{{ $get }}/laliga">
        <img class="logoflag" src="{{ $link }}espagne.svg">
        <span class="onlydesk nextTo-logo">LaLiga</span>
    </a>
    <a class="lil @if($url == 'ligue-1') activ @endif" href="/{{ $get }}/ligue-1">
        <img class="logoflag" src="{{ $link }}france.svg">
        <span class="onlydesk nextTo-logo">Ligue 1</span>
    </a>
    <a class="lil @if($url == 'bundesliga') activ @endif" href="/{{ $get }}/bundesliga">
        <img class="logoflag" src="{{ $link }}allemagne.svg">
        <span class="onlydesk nextTo-logo">Bundesliga</span>
    </a>
    <a class="lil @if($url == 'serie-a') activ @endif" href="/{{ $get }}/serie-a">
        <img class="logoflag" src="{{ $link }}italie.svg">
        <span class="onlydesk nextTo-logo">Serie A</span>
    </a>
</div>