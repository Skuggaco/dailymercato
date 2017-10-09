<h1 class="title">
    <strong>
        <span class='glyspe glyphicon glyphicon-{{ $icon }}'></span>
        {!! $title !!}
        @isset($get)
            @include ('public.tabs.partials.leaguesAddOn', ['get' => $get])
        @endif
    </strong>
</h1>