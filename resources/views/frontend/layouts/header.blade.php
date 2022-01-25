<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Student</div>
        <div class="masthead-heading text-uppercase">Welcome to Student Portal</div>
        <p>@include('flash-message')</p>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href=#><img src='{{ asset('frontend\assest\img\student-logo2.png') }}'
                alt="..." /></a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                @if (auth()->user())
                    <li class="nav-item"><a class="nav-link" href="{{ route('marks.create') }}"> Add
                            Marks,✍🏼</a></li>
                    <li class="nav-item"><a class="nav-link" title="Do addmission"
                            href="{{ route('addmission.create') }}">
                            Admmision ,&#x1F60A;</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('addmoission-confirm.index') }}"> Admission Confirm ,&#x1F60A;</a>
                    </li>
                    <li class=" nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('logout') }}"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item input1" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                    </li>
                @else
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        <a href="{{ route('login') }}" class="input1">Login</a>
                        <a href="{{ route('register') }}" class="input1">Register</a>
                    </div>
            </ul>
        </div>
        @endif
        </ul>
    </div>
    </div>
</nav>
