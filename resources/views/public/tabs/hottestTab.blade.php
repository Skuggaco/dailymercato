<div class="col-md-12">
    <div class="col-md-12 nopad">
        {{-- Title of the tab --}}
        @include ('public.tabs.partials.titleTab', [
                  'icon'  => 'fire',
                  'title' => 'Les transferts les plus chauds',
                  'get'   => $name])

        {{-- Type of the tab, here a table rumours with up/down vote system --}}
        @include ('public.tabs.partials.table-rumours', [
                  'transfers' => $transfers,
                  'class'     => 'hottestTab'])

        {{-- More button, to show several items --}}
        @include ('public.tabs.partials.loadingButton', [
                  'id'          => '1',
                  'currentPage' => $transfers->current_page,
                  'lastPage'    => $transfers->last_page])
    </div>
</div>