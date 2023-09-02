<div>
    @if($errors->any())
        @php
            $this->dispatch('dispatch-toast', detail: [
                'type' => 'danger',
                'title' => 'Form validation failed!',
                'message' => 'Please check for errors in your form.',
            ]);    
        @endphp
    @endif

    <form wire:submit="update">
        <h6 class="fw-bold">Personal Information</h6>
        <div class="row g-3 mb-3">
            <div class="col-6">
                <x-form-label for="first_name" label="First Name" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="first_name"
                placeholder="Enter your first name"
                name="form.first_name" 
                wire:model="form.first_name" />
            </div>
            <div class="col-6">
                <x-form-label for="last_name" label="Last Name" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="last_name"
                placeholder="Enter your last name"
                name="form.last_name" 
                wire:model="form.last_name" />
            </div>
            <div class="col-6">
                <x-form-label for="birthday" label="Birthday" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="date" 
                id="birthday"
                placeholder="Enter your birthday"
                name="form.birthday" 
                wire:model="form.birthday" />
                <small class="text-muted">
                    dd/mm/yyyy
                </small>
            </div>
            <div class="col-6">
                <x-form-label for="age" label="Age" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="number" 
                id="age"
                placeholder="Enter your age"
                name="form.age" 
                wire:model="form.age" />
            </div>
        </div>
        <h6 class="fw-bold">Contact Information</h6>
        <div class="row g-3 mb-3">
            <div class="col-6">
                <x-form-label for="phone_number" label="Phone Number" class="mb-0"/>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">+63</span>
                    <x-form-input 
                    class="form-control-sm"
                    type="text" 
                    id="phone_number"
                    placeholder="Enter your phone number"
                    name="form.phone_number" 
                    wire:model="form.phone_number" />
                </div>
            </div>
            <div class="col-6">
            </div>
            <div class="col-6">
                <x-form-label for="address_1" label="Address 1" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="address_1"
                placeholder="Enter your address"
                name="form.address_1" 
                wire:model="form.address_1" />
                <small class="text-muted">
                    House/Bldg No., Street, Subdivision
                </small>
            </div>
            <div class="col-6">
                <x-form-label for="address_2" label="Address 2" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="address_2"
                placeholder="Enter your address"
                name="form.address_2" 
                wire:model="form.address_2" />
                <small class="text-muted">
                    Barangay, Municipality, etc...
                </small>
            </div>
        </div>
        <h6 class="fw-bold">Bio</h6>
        <div class="row g-3 mb-3">
            <div class="col-12">
                <textarea 
                name="form.bio" 
                id="bio" 
                rows="4" 
                class="form-control" 
                placeholder="Enter a bio..."
                wire:model="form.bio"></textarea>
            </div>
        </div>
        <h6 class="fw-bold mb-0">Social Links</h6>
        <small class="fw-bold text-info">
            always include https://
        </small>
        <div class="row g-3">
            <div class="col-md-9">
                @foreach($social_links as $index => $social_link)
                    <div class="d-flex mb-1" wire:key="{{ $index }}">
                        <div class="row gx-1">
                            <div class="col">
                                <x-form-input 
                                class="form-control-sm"
                                type="text" 
                                id="social_links.{{ $index }}.name"
                                placeholder="Enter social link name"
                                name="social_links.{{ $index }}.name" 
                                wire:model="social_links.{{ $index }}.name" />
                            </div>
                            
                            <div class="col">
                                <x-form-input 
                                class="form-control-sm"
                                type="text" 
                                id="social_links.{{ $index }}.link"
                                placeholder="Enter social link url"
                                name="social_links.{{ $index }}.link" 
                                wire:model="social_links.{{ $index }}.link" />
                                
                            </div>
                        </div>
                        
                        <div>
                            @if($loop->last)
                                <button 
                                type="button" 
                                class="btn btn-sm btn-outline-primary ms-1"
                                wire:click="addSocialLink">
                                    <i class="fas fa-plus"></i>
                                </button>
                            @else
                                <button 
                                type="button" 
                                class="btn btn-sm btn-outline-danger ms-1"
                                wire:click="removeSocialLink({{ $index }})">
                                    <i class="fas fa-minus"></i>
                                </button>
                            @endif
                        </div>
                        {{-- check if item is last index --}}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-start mt-3">
            <x-button type="submit">
                Update
            </x-button>
        </div>
    </form>
</div>


