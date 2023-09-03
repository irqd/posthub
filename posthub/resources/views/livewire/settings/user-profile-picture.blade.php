<div>
    @if($errors->has('profilePicture'))
        @php
            $this->dispatch('dispatch-toast', detail: [
                'type' => 'danger',
                'title' => 'Form validation failed!',
                'message' => 'File must be an image and maximum of 1mb.',
            ]);    
        @endphp
    @endif

    <div 
        wire:ignore
        x-data
        x-init="
            FilePond.registerPlugin(FilePondPluginImagePreview);

            FilePond.setOptions({
                server: {
                    // TODO: Implement this
                    load: (source, load, error, progress, abort, headers) => {
                        // Should call the load method when done and pass the file item
                        // load is not getting called for some reason
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
                styleButtonRemoveItemPosition: 'left bottom',
                styleButtonProcessItemPosition: 'center bottom',
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
        @if($profilePicture)
            <x-button wire:click="updateProfilePicture" class="w-100">Upload</x-button>
        @endif
    </div>
</div>