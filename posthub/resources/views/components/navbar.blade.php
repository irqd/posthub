<nav class="navbar navbar-expand-lg bg-body-tertiary px-lg-3 sticky-top">
    <div class="container d-flex justify-content-between">
        <div class="d-flex">
            <a class="navbar-brand text-body fw-bold" href="/" wire:navigate><span class="text-primary">Post</span>Hub</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}" wire:navigate>Home</a>
                </li>
            </ul>
        </div>
        
        @if(Auth::check())
            <div class="dropdown">
                {{-- <span class="pe-1">
                    <strong class="text-success">User</strong>
                </span> --}}
                <button class="btn p-0 rounded-circle focus-ring" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="{{ asset('images/default.svg') }}" class="img-thumbnail rounded-circle" alt="user-thumbnail" width="40">
                </button>
                <div class="dropdown-menu dropdown-menu-end mt-2" data-bs-theme="light">
                    <a class="dropdown-item" href="{{ route('settings.profile') }}" wire:navigate>Settings</a>
                    <hr class="dropdown-divider">
                    <div class="dropdown-item">
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <input type="submit" class="nav-link text-danger" value="Logout">
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex">
                <a href="{{ route('auth.login') }}" class="btn btn-sm btn-outline-primary me-2" wire:navigate>Login</a>
                <a href="{{ route('auth.register') }}" class="btn btn-sm btn-primary" wire:navigate>Register</a>
            </div>
        @endif
    </div>
</nav>
