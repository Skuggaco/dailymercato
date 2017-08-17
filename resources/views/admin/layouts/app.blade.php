@include ('admin.layouts.header')
@include ('admin.layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('name_page')
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ action('Backend\DashBoardController@index') }}"><i class="fa fa-dashboard"></i> Index</a></li>
            <li class="active">@yield('name_page')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include ('flash::message')
        @yield('content')
    <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



@include ('admin.layouts.footer')