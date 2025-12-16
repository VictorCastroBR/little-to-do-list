<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('tasks.index') }}" style="color: #334155; letter-spacing: -0.5px;">
            <span class="me-2">✅</span> SimpleTasks
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link fw-medium {{ request()->routeIs('tasks.index') ? 'active text-primary' : 'text-muted' }}"
                           href="{{ route('tasks.index') }}">
                           Tarefas
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold d-flex align-items-center py-2 px-3 bg-light rounded-pill"
                           href="#"
                           id="navbarDropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                           style="color: #475569;">
                            <div class="avatar-circle me-2">{{ substr(Auth::user()->name, 0, 1) }}</div>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-3" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger d-flex align-items-center">
                                        <span class="me-2">🚪</span> Sair
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</nav>
