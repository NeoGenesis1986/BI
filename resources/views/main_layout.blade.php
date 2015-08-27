<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title')</title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
    @yield('scripts')
</head>
<body>
<section id="container">
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="{{ URL::asset('dashboard') }}" class="logo"><b>BI</b></a>
        <!--logo end-->
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="#">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <a href="{{ URL::asset('dashboard') }}">
                    <p class="centered"><img src="{{ URL::asset('img/icon_logo.png') }}" width="64px"></p>
                    <h5 class="centered">Palliser</h5>
                </a>

                <li class="mt">
                    <a class="active" href="{{ URL::asset('dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Balence de paiement</span>
                    </a>
                    <ul class="sub">
                        <li>&nbsp;</li>
                        <li>Par Mois</li>
                        <li><a href="general.html">Simple</a></li>
                        <li><a href="buttons.html">Comparaison</a></li>
                        <li><a href="panels.html">Différence</a></li>
                        <li>&nbsp;</li>
                        <li>Par Année</li>
                        <li><a href="general.html">Simple</a></li>
                        <li><a href="buttons.html">Comparaison</a></li>
                        <li><a href="panels.html">Différence</a></li>
                    </ul>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
</section>
<section id="main-content">
    <section class="wrapper">
        @yield('content')
    </section>
</section>

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ URL::asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ URL::asset('js/common-scripts.js') }}"></script>
</body>
</html>