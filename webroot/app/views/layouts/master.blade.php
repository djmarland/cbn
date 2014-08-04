<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/static/{{ Config::get('app.version') }}/css/global.css" />
        <title>CBN</title>
        <meta name="description" content="CBN" />
        <meta name="viewport" content="width=device-width" />
    </head>
    <body>
        <!--[if lt IE 9]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div class="header situated--half">
            <div class="grid">
                <div class="g g-1-2">
                    <div class="header__logo"><a href="{{ URL::route('home') }}"><strong>THINGSPACE</strong></a></div>
                </div>
                <div class="g g-1-2">
                    <div class="header__nav" id="nav">
                        <nav>
                        <ul class="list--unstyled text--right">
                                <li class="header__navitem header__search"><input type="search" placeholder="Search for a business or skillset" /><button class="btn" ype="submit"><i class="fa fa-search"></i></button></li>
                            @if(Auth::check())
                                <li class="header__navitem"><a href="{{ URL::route('user_dashboard', array('key' => Auth::user()->url_key())) }}">Dashboard</a></li>
                                <li class="header__navitem"><a href="{{ URL::route('logout') }}"><i class="fa fa-sign-out"></i> Log out</a></li>
                            @else
                                <li class="header__navitem"><a href="{{ URL::route('login') }}"><i class="fa fa-sign-in"></i> Log in / Register</a></li>
                            @endif
                        </ul><!--
                        --></nav><!--
                    --></div><!-- end nav -->
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
            -<br />
            -<br />
            -<br />
            -<br />

            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
        </div>

        <div class="footer situated">
            FOOTER
        </div>
    </body>
</html>
