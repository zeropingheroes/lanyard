<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">@lang('title.login')</a></li>
                @else
                    @if (Auth::user()->hasRole('super admin', 'admin'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> @lang('title.admin')
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('role-assignment.index') }}">
                                        @lang('title.role-assignments')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('organiser.index') }}">
                                        @lang('title.organisers')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('venue.index') }}">
                                        @lang('title.venues')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('event.index') }}">
                                        @lang('title.events')
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('user.profile', auth()->user()->id) }}">
                                    @lang('title.profile')
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    @lang('title.logout')
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>