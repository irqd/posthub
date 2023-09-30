<div class="d-flex flex-column gap-3" id="post_list" wire:poll>
    @foreach($posts as $index => $post)
        <div class="card" wire:key={{ $index }}>
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        
                    </div>
                    <div class="dropdown" wire:ignore>
                        <button class="btn btn-sm text-decoration-none text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end mt-2 p-1">
                            <a class="dropdown-item text-warning fw-bold" href="#">
                                <i class="fa-solid fa-pen"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="fw-bold m-0">{{ $post->title }}</h6>
                        </div>
                        <div>
                            <span class="badge rounded-pill text-bg-primary">
                                {{ $post->topic }}
                            </span>
                        </div>
                    </div>
                </div>
                <div 
                    wire:ignore
                    x-data
                    x-init="
                        const quillContent{{ $index }} = new Quill($refs.postContent{{ $index }}, {
                            readOnly: true,
                            theme: 'snow',
                        })
                        
                        // set content
                        const contentJSON{{ $index }} = {{ json_encode($post->content) }};
                        const delta{{ $index }} = JSON.parse(contentJSON{{ $index }});
                        quillContent{{ $index }}.setContents(delta{{ $index }});

                        // remove toolbar
                        let editorToolbar{{ $index }} = $refs.postContent{{ $index }}.previousElementSibling;
                        editorToolbar{{ $index }}.remove();

                        // edit ql container
                        let editorContainer{{ $index }} = $refs.postContent{{ $index }};
                        editorContainer{{ $index }}.classList.add(
                            'border-0',
                            'p-0'
                        );
                    "
                >
                    <div class="card-text" x-ref="postContent{{ $index }}"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
