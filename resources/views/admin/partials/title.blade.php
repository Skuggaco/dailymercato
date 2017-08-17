<div class="row">
    <div class="col-md-2 col-xs-12">
        <h1>{{ $title }}</h1>
    </div>
    <div class="col-md-10 col-xs-12">
        <p>
            <a href="{{ action('Backend\\'.$controller.'@create') }}"
               class = "btn btn-primary form-control btn-admin-add">Ajouter {{ $add }}</a>
        </p>
    </div>
</div>