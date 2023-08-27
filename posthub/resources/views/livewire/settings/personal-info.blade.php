<div>
    <form>
        <h5 class="fw-bold">Personal Information</h5>
        <div class="row g-3 mb-3">
            <div class="col-6">
                <x-form-label for="first_name" label="First Name" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="first_name"
                placeholder="Enter your first name"
                name="first_name" 
                wire:model.blur="first_name" />
            </div>
            <div class="col-6">
                <x-form-label for="last_name" label="Last Name" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="last_name"
                placeholder="Enter your last name"
                name="last_name" 
                wire:model.blur="last_name" />
            </div>
            <div class="col-6">
                <x-form-label for="last_name" label="Last Name" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="last_name"
                placeholder="Enter your last name"
                name="last_name" 
                wire:model.blur="last_name" />
            </div>
            <div class="col-6">
                <x-form-label for="last_name" label="Last Name" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="last_name"
                placeholder="Enter your last name"
                name="last_name" 
                wire:model.blur="last_name" />
            </div>
        </div>
        <h5 class="fw-bold">Contact Information</h5>
        <div class="row g-3 mb-3">
            <div class="col-6">
                <x-form-label for="first_name" label="Phone Number" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="first_name"
                placeholder="Enter your first name"
                name="first_name" 
                wire:model.blur="first_name" />
            </div>
            <div class="col-6">
            </div>
            <div class="col-6">
                <x-form-label for="first_name" label="Address 1" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="first_name"
                placeholder="Enter your first name"
                name="first_name" 
                wire:model.blur="first_name" />
                <small class="text-muted">
                    House/Bldg No., Street, Subdivision
                </small>
            </div>
            <div class="col-6">
                <x-form-label for="first_name" label="Address 2" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="first_name"
                placeholder="Enter your first name"
                name="first_name" 
                wire:model.blur="first_name" />
                <small class="text-muted">
                    Barangay, Municipality, etc...
                </small>
            </div>
        </div>
        <h5 class="fw-bold">Bio</h5>
        <div class="row g-3 mb-3">
            <div class="col-12">
                <textarea 
                name="bio" 
                id="bio" 
                rows="4" 
                class="form-control" 
                placeholder="Enter a bio..."></textarea>
            </div>
        </div>
        <h5 class="fw-bold">Social Links</h5>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="d-flex">
                    <x-form-input 
                    class="form-control-sm"
                    type="text" 
                    id="first_name"
                    placeholder="Enter your first name"
                    name="first_name" 
                    wire:model.blur="first_name" />
                    <button class="btn btn-sm btn-outline-primary ms-1">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-start mt-5">
            <button class="btn btn-primary">
                Update
            </button>
        </div>
    </form>
</div>

