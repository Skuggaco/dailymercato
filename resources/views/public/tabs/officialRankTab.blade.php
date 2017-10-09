<div class="col-md-12">
    <div class="col-md-12 nopad">
        {{-- Title of the tab --}}
        @include ('public.tabs.partials.titleTab', [
                  'icon'  => 'signal',
                  'title' => 'Classement des plus gros transferts',
                  'get'   => $name])

        {{-- Type of the tab, here a table rumours with up/down vote system --}}
        @include ('public.tabs.partials.table-officials', [
                  'transfers' => $transfers,
                  'class'     => 'officialTab'])

        {{-- More button, to show several items --}}
        @include ('public.tabs.partials.loadingButton', [
                  'id'          => '2',
                  'currentPage' => $transfers->current_page,
                  'lastPage'    => $transfers->last_page])
    </div>
</div>