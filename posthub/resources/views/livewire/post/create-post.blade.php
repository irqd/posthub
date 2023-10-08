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
        <div class="mb-2 d-flex gap-2 w-100" id="title_input">
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
        <div class="w-100 mb-2">
            <div class="form-floating">
                <textarea 
                    class="form-control form-control-sm"" 
                    placeholder="Content Here"
                    id="content"
                    name="content"
                    wire:model.live="content"
                ></textarea>
                <label for="content"><small class="text-muted">Content</small></label>
            </div>
        </div>
        <button 
            @class([
                'btn btn-primary mt-1 w-100',
                'd-none' => strlen(trim($content)) == 0
            ])
            id="publish_button">
            Publish
        </button>
    </form>
</div>