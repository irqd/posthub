<nav class="navbar navbar-expand-lg bg-body-tertiary px-lg-3 py-lg-3 sticky-top shadow-sm">
    <div class="container d-flex justify-content-between align-items-start">
        <div class="d-flex">
            <a class="navbar-brand text-body fw-bold" href="{{ route('index') }}" wire:navigate><span class="text-primary">Post</span>Hub</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}" wire:navigate>Home</a>
                </li>
            </ul>
        </div>

        <div @class([
                'd-none w-50',
                'd-md-block' => request()->routeIs('posts.index') || request()->routeIs('posts.profile'),
            ])
        >
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search posts...">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#search" aria-controls="search" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-search"></i>
            </button>

            @if(Auth::check())
                <div class="dropdown">
                    <span class="d-none d-md-inline-block fw-bold">
                        {{ auth()->user()->username }}
                    </span>
                    <button class="btn p-0 rounded-circle focus-ring" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <livewire:misc.nav-profile-picture />
                    </button>
                    <div class="dropdown-menu dropdown-menu-end mt-2" data-bs-theme="light">
                        <a class="dropdown-item text-primary fw-bold" href="{{ route('posts.profile', ['username' => auth()->user()->username]) }}" wire:navigate>
                            <i class="fa-solid fa-user"></i> Profile
                        </a>
                        {{-- TEMP FIX: removed wire:navigate --}}
                        <a class="dropdown-item text-primary fw-bold" href="{{ route('settings.profile') }}">
                            <i class="fa-solid fa-gear"></i> Settings
                        </a>
                        <hr class="dropdown-divider">
                        <div class="dropdown-item">
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                <div class="d-flex gap-2 fw-bold">
                                    <i class="fa-solid fa-right-from-bracket mt-1 text-danger"></i>
                                    <input type="submit" class="nav-link text-danger" value="Logout">
                                </div>
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
        
        <div class="collapse w-100" id="search">
            <div class="input-group mt-2 w-100">
                <input type="text" class="form-control" name="search" placeholder="Search posts...">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
