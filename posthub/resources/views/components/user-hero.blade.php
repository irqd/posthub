<div class="card">
    <div class="card-body">
        <div class="row align-items-start">
            <div class="col-3">
                @if($user->profile->profile_picture)
                    <img src="{{ asset('storage/'.$user->profile->profile_picture) }}" class="img-thumbnail rounded-circle" alt="user-thumbnail" width="100">
                @else
                    <img src="{{ asset('images/default.svg') }}" class="img-thumbnail rounded-circle" alt="user-thumbnail" width="100">
                @endif

                <div class="d-flex justify-content-between align-items-center">
                    <div class="fw-bold">
                        <small>Total Posts</small>
                    </div>
                    <div>
                        <span class="badge rounded-pill text-bg-primary d-flex align-items-center pt-1">
                            {{ $user->posts->count() }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="d-flex justify-content-between">
                    <h1 class="fw-bold">
                        {{ $user->username }}
                    </h1>
                    <div>
                        @if($user->id == auth()->user()->id)
                            <a href="{{ route('settings.profile') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="card-text mt-2">{{ $user->profile->bio ?? $user->username.' does not have a bio'}}</div>
            </div>
            
        </div>
        
    </div>
</div>