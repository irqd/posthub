<div class="d-flex flex-column gap-3" 
    id="post_list" 
    wire:poll="getPosts"
>
    @foreach($posts as $index => $post)
        <div class="card" wire:key={{ $index }}>
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-start align-items-center gap-2">
                        @if($post->user->profile->profile_picture)
                            <img src="{{ asset('storage/'.$post->user->profile->profile_picture) }}" class="img-thumbnail rounded-circle" alt="user-thumbnail" width="40">
                        @else
                            <img src="{{ asset('images/default.svg') }}" class="img-thumbnail rounded-circle" alt="user-thumbnail" width="40">
                        @endif
                        <div class="d-flex flex-column gap-0">
                            <a  
                                href="#"
                                class="fw-bold m-0 h-6 link-primary text-decoration-none" 
                            >
                                {{ $post->user->username }}
                            </a>
                            <small>{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>  
                    <div class="dropdown" wire:ignore>
                        <button class="btn btn-sm text-decoration-none text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end mt-2 p-1">
                            @if($post->user_id == auth()->user()->id)
                                <a class="dropdown-item text-warning" href="#">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </a>
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </a>
                            @else
                                <a class="dropdown-item text-info" href="#">
                                    <i class="fa-solid fa-flag"></i>
                                    Report
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title p-0 m-0">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="fw-bold mt-2 mb-0">{{ $post->title }}</h6>
                        </div>
                        <div>
                            <span class="badge rounded-pill text-bg-primary">
                                {{ $post->topic }}
                            </span>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
        </div>
    @endforeach

    {{-- this will act as the observer --}}
    {{-- if the scroll reach this div, call loadMore --}}
    <div x-data="{
        observe() {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        $wire.loadMore();
                    }
                });
            }, {
                //root: null,
                rootMargin: '-250px 0px 0px 0px'
            });

            observer.observe(this.$el);
        }
    }"

    x-init="observe()"
    >    
    </div>
</div>

