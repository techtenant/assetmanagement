<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}" style="color: #000">{{ config('app.name') }}</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                {{--<li class="{{ Request::is('/dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>--}}

                {{--@if (Sentinel::check() && Sentinel::inRole('moderator'))--}}
                    {{--<li class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}">--}}

                {{--@elseif (Sentinel::check() && Sentinel::inRole('administrator'))--}}

                    {{--<li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}">--}}
                           {{--<i class="fa fa-tasks" aria-hidden="true"></i> Roles</a></li>--}}

                {{--@endif--}}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Sentinel::check())
                    <li><a href="{{ route('auth.logout') }}">Log Out</a></li>
                @else
                    <li><a href="{{ route('auth.login.form') }}">
                            <i class="fa fa-sign-in"></i> Login</a></li>

                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>