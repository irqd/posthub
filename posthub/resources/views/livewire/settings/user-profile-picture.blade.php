<div class="mb-3 mb-md-0">
    @if($errors->has('profilePicture'))
        @php
            $this->dispatch('dispatch-toast', detail: [
                'type' => 'danger',
                'title' => 'Profile Picture Error',
                'message' => 'File must be an image and maximum of 1mb.',
            ]);    
        @endphp
    @endif

    <div 
        wire:ignore
        x-data
        x-on:create-filepond="console.log('test');"
        x-init="
            document.addEventListener('livewire:initialized', () => {
                
            });  

            FilePond.registerPlugin(FilePondPluginImagePreview);

            FilePond.setOptions({
                server: {
                    load: (source, load, error, progress, abort, headers) => {
                        fetch(source)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.blob();
                        })
                        .then(load)
                        .catch(error);
                    },

                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        @this.upload('profilePicture', file, load, error, progress);
                    },

                    revert: (filename, load) => {
                        @this.removeUpload('profilePicture', filename, load);
                    },
                },
            });
            
            FilePond.create($refs.input, {
                stylePanelLayout: 'compact circle',
                styleLoadIndicatorPosition: 'center bottom',
                styleProgressIndicatorPosition: 'center bottom',
                styleButtonRemoveItemPosition: 'center bottom',
                styleButtonProcessItemPosition: 'center bottom',

                @if($profilePicture)
                    files: [
                        {
                            source: '{{ asset("storage/$profilePicture") }}',
                            options: {
                                type: 'local',
                            },
                        }
                    ],
                @endif
            });
        "
    >   
        <input 
        type="file"
        x-ref="input"
        id="profilePicture"
        name="profilePicture"
        wire:model="profilePicture" accept="image/*" />
    </div>

    <div>
        @if(gettype($profilePicture) == 'object')
            <x-button wire:click="updateProfilePicture" class="w-100">Update</x-button>
        @elseif(gettype($profilePicture) == 'string')
            <x-button wire:click="deleteProfilePicture" class="btn-danger w-100">Delete</x-button>
        @endif
    </div>
</div>