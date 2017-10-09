@if($currentPage <= $lastPage)
    <p class="centered voir" id="voir-{{ $id }}">
        <span id="{{ $currentPage }}" class="glyphicon glyphicon-chevron-down chevron"></span>
        Voir plus
    </p>
    <p class="centered voir nomore" id="nomore-{{ $id }}">
        <span class="glyphicon glyphicon-lock chevron"></span>
        Pas plus de transferts à afficher
    </p>
@else
    <p class="centered voir">
        <span class="glyphicon glyphicon-lock chevron"></span>
        Pas plus de transferts à afficher
    </p>
@endif