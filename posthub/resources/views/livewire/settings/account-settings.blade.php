<form wire:submit="update">
    <div class="row gap-3">
        <div class="col-12">
            <x-form-label for="username" label="Username" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="text" 
                id="username"
                placeholder="Enter your username"
                name="username" 
                wire:model="username" disabled/>
        </div>
        <div class="col-12">
            <x-form-label for="email" label="Email" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="email" 
                id="email"
                placeholder="Enter your email"
                name="email" 
                wire:model="email" disabled/>
        </div>

        <div class="col-12">
            <x-form-label for="old_password" label="Old Password" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="password"
                id="old_password"
                placeholder="Enter your old password"
                name="old_password" 
                wire:model="old_password" />
        </div>

        <div class="col-12">
            <x-form-label for="new_password" label="New Password" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="password" 
                id="new_password"
                placeholder="Enter your new password"
                name="new_password" 
                wire:model="new_password" />
        </div>
        <div class="col-12">
            <x-form-label for="password_confirmation" label="Confirm Password" class="mb-0"/>
                <x-form-input 
                class="form-control-sm"
                type="password" 
                id="password_confirmation"
                placeholder="Confirm your new password"
                name="password_confirmation" 
                wire:model="password_confirmation" />
        </div>
    </div>

    <x-button type="submit" class="mt-3">
        Update Password
    </x-button>
</form>
