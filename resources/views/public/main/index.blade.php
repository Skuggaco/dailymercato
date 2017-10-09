@extends('public.layouts.app')

@section('content')
    {{-- 1. Hottest table, with the most rated rumours --}}
    @include ('public.tabs.hottestTab')

    {{-- Button for the stock exchange tab --}}
    @include ('public.tabs.partials.homeButton', [
              'controller' => 'Frontend\TabsController@officialRankTab',
              'icon' => 'line-chart',
              'title' => 'Dembélé, Mbappé, Coutinho : combien valent-ils ?'])

    {{-- 2. Official table, only real transfers --}}
    @include ('public.tabs.officialTab')

    {{-- Button for the rankings of transfers --}}
    @include ('public.tabs.partials.homeButton', [
              'controller' => 'Frontend\TabsController@officialRankTab',
              'icon' => 'signal',
              'title' => 'Classement des plus gros transferts'])
@endsection