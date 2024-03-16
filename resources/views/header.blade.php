<header id="site-header" class="fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ url("/home") }}" class="navbar-brand">
                <i class="fas fa-graduation-cap"></i>G1 School
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">
                    @if(auth()->user()?->role != 'ADMIN')
                        <li class="nav-item">
                            <a href="{{ url("/home") }}" class="nav-link active" aria-current="page">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url("/courses") }}" class="nav-link">Courses</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url("/buildings") }}" class="nav-link">Buildings</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url("/departments") }}" class="nav-link">Departments</a>
                        </li>
                    @endif
                    @auth
                        @if (auth()->user()->role != 'ADMIN')
                                @if (auth()->user()->role == 'STUDENT')
                                <li class="nav-item">
                                    <a href="{{ url("/myEnrollment") }}" class="nav-link">My Courses</a>
                                </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ url("/myClasses") }}" class="nav-link">My Classes</a>
                                    </li>
                                  @endif

                        @endif
                    @else
                    @endauth

                    @auth
                        @if (auth()->user()->role != 'ADMIN')
                            <li class="nav-item">
                                <a href="{{ route('profile.edit') }}" class="nav-link">User Profile</a>
                            </li>
                        @endif
                    @else
                    @endauth
                        @auth
                            @if(auth()->user()->role == 'ADMIN')
                                <li class="nav-item">
                                    <a href="{{ url("/admin") }}" class="nav-link">Dashboard</a>
                                </li>
                            @endif
                        @endauth

                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="nav-link" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    Logout
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ url("/login") }}" class="nav-link">Login</a>
                        </li>
                    @endauth


                </ul>
            </div>
            <!-- toggle switch for light and dark theme -->
            <div class="cont-ser-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
        </nav>
    </div>
</header>
