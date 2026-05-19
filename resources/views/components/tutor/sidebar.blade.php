<div id="sidebar"
     class="bg-dark text-white p-3 d-flex flex-column"
     style="width: 250px; min-height: 100vh;">

    {{-- PROFILE --}}
    <div class="text-center mb-4">

        <img src="{{ asset('storage/user/' . auth()->user()->profile_picture) }}"
             class="rounded-circle mb-3 border border-3 border-warning"
             width="90"
             height="90"
             style="object-fit: cover;">

        <h5 class="fw-bold mb-1">
            {{ auth()->user()->name }}
        </h5>

        <small class="text-secondary">
            Instructor Panel
        </small>

        <div class="mt-3">

            <form action="{{ route('logout') }}"
                  method="POST">

                @csrf

                <button class="btn btn-warning btn-sm px-4 fw-semibold">

                    Logout

                </button>

            </form>

        </div>

    </div>

    {{-- TITLE --}}
    <h4 class="text-center fw-bold mb-4"
        style="color: #FFD400;">

        TUTOR PANEL

    </h4>

    {{-- MENU --}}
    <ul class="nav flex-column">

        
        

        {{-- STUDENTS PACKAGE --}}
        <li class="nav-item mb-2">

            <a href=""
               class="nav-link text-white">

                Student Packages

            </a>

        </li>

        {{-- DRIVING SESSION --}}
        <li class="nav-item mb-2">

            <a href="{{ route('tutor.driving-session.index') }}"
               class="nav-link text-white">

                Driving Sessions

            </a>

        </li>

    </ul>

    {{-- FOOTER --}}
    <div class="mt-auto text-center pt-4">

        <small class="text-secondary">
            © {{ date('Y') }} Driving Course
        </small>

    </div>

</div>