<div>
    @if($errors->any())
        <div class="alert alert-danger d-flex align-items-start px-1 pb-0" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                   <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form wire:submit="submit" class="d-flex flex-column align-items-center w-100">
        @csrf
        <div 
            wire:ignore
            id="quill_parent" 
            class="w-100" 
            x-data 
            x-init="
            quill = new Quill($refs.editor, {
                theme: 'snow'
            });
            
            // target ql-toolbar class then apply bootstrap classes
            let editorToolbar = $refs.editor.previousElementSibling;
            editorToolbar.classList.add(
                'shadow-sm',
                'mb-2',
                'rounded-3',
            );
            
            // target ql-container class then apply bootstrap classes
            let editorContainer = $refs.editor;
            editorContainer.classList.add(
                'border-top',
                'p-0',
                'rounded-3',
                'shadow-sm',
                'pt-2',
            );
            
            // teleport title input between content and toolkit
            let titleInput = document.getElementById('title_input');
            let parent = document.getElementById('quill_parent');
            
            parent.insertBefore(titleInput, parent.children[3]);
            
            // teleport word counter to ql-editor upper right corner
            let wordCounter = document.getElementById('char_counter');
            editorContainer.appendChild(wordCounter);
            wordCounter.classList.add(
                'position-absolute',
                'top-0',
                'end-0',
                'pt-1',
                'pe-2',
                'text-muted',
                'small',
            );
            
            quill.on('text-change', function() {
                // update $post property
                $wire.set('content', JSON.stringify(quill.getContents()));
    
                // count character
                let text = quill.getText().trim(); // Trim whitespace
                let charCount = text.length;
                document.getElementById('char_counter').innerHTML = charCount + '/1000';
            });

            // manually reseting the quill text editor
            Livewire.on('reset-content', () => {
                quill.setText('');
            });
        ">
            <div class="mb-2 d-flex gap-2" id="title_input">
                <input 
                    type="text" 
                    class="form-control form-control-sm" 
                    name="title" 
                    wire:model="title"
                    placeholder="Title"
                >
                
                <input 
                    type="text" 
                    class="form-control form-control-sm" 
                    name="topic" 
                    wire:model="topic"
                    placeholder="Topic"
                >
            </div>
    
            <div id="char_counter" class="text-body-emphasis text-muted">
                0/1000
            </div>
            <div id="editor" x-ref="editor"></div>
        </div>
        <button 
            @class([
                'btn btn-primary mt-1 w-100',
                // 'd-none' => strlen(trim($content)) == 0
            ])
            id="publish_button">
            Publish
        </button>
    </form>
</div>
