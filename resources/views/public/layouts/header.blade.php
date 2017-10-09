<!DOCTYPE html>
<html>
<head>
    {{-- @include ('public.partials.onesignal') --}}
    @include ('public.partials.analytics')
    @include ('public.partials.favicons')
    @include ('public.partials.metas')
</head>

<body>

<nav class="navbar navbar-top navbar-inverse">
    <div class="container c-header">
        <div class="navbar-header">
            <a class="navbar-brand logo" href="/">
                <img src="/storage/design/logogris.png"
                     onmouseover="this.src='/storage/design/logowhite.png'"
                     width="40px" height="40px"
                     onmouseout="this.src='/storage/design/logogris.png'">
            </a>
        </div>
        <div id="inputsearch" class="col-md-5 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
            <div class="input-group stylish-input-group">
                <input type="text" class="form-control" id="searchFocus" placeholder="Rechercher" >
                <span class="input-group-addon">
                <button type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
            </div>
            <div id="result"></div>
        </div>
        <div class="col-md-3 line-timer hidden-xs">
            <p><span id="clock"></span></p>
        </div>
        <div class = "posre">
            <ul class="nav navbar-nav custom-nav">
                <li><a href="https://www.facebook.com/DailyMercato" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com/DailyMercato" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/dailymercato/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <!--<li><a href=""><i class="fa fa-rss" aria-hidden="true"></i></a></li>-->
            </ul>
        </div>
    </div><!-- /.container -->
</nav><!-- /.navbar -->

