<div class="my-5 d-flex justify-content-center">
    <div class="card mb-3 w-100 rounded-0">
        <div class="row g-0">
            <div class="col-md-7 col-lg-8">
                <img src="{{ asset('images/register.jpg') }}" class="img-fluid h-100" alt="Register">
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="card-body h-100 p-lg-5">
                    <div class="d-flex flex-column w-100 h-100 justify-content-center align-items-center">
                        <div>
                            <h3 class="fw-bold text-center">Register</h3>
                            <hr class="text-primary">
                            <form wire:submit="register">
                                @csrf

                                @unless($isNext)
                                    <!-- Username input -->
                                    <div class="mb-3">
                                        <x-form-label for="username" label="Username" required="true" />
                                        <x-form-input 
                                        type="text" 
                                        id="username"
                                        placeholder="Enter a unique username"
                                        name="userForm.username" 
                                        wire:model.blur="userForm.username" />
                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-3">
                                        <x-form-label for="email" label="Email" required="true" />
                                        <x-form-input 
                                        type="email" 
                                        id="email"
                                        placeholder="Enter a valid email address" 
                                        name="userForm.email"
                                        wire:model.blur="userForm.email" />
                                    </div>

                                    <!-- Password input -->
                                    <div class="mb-3">
                                        <div class="d-flex flex-column justify-content-between">
                                            <x-form-label class="mb-0 pb-0" for="password" label="Password" required="true" />

                                            <small class="p-0 m-0 text-info" style="font-size: .60rem;">
                                                min. of 8 characters, with 1 uppercase, number, and special character
                                            </small>
                                        </div>
                                        <x-form-input 
                                        type="password" 
                                        id="password" 
                                        placeholder="Enter a strong password"
                                        name="userForm.password" 
                                        wire:model.blur="userForm.password" />
                                    </div>

                                    <!-- Confirm Password input -->
                                    <div class="mb-3">
                                        <x-form-label for="password_confirmation" label="Confirm Password"
                                            required="true" />

                                        <x-form-input 
                                        type="password" 
                                        id="password_confirmation"
                                        placeholder="Confirm your password" 
                                        name="userForm.password_confirmation"
                                        wire:model.blur="userForm.password_confirmation" />
                                    </div>
                                @else
                                    <x-button class="btn-sm" wire:click="next">
                                        <i class="fas fa-arrow-left"></i>
                                    </x-button>

                                    <div class="row g-1 mt-1">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <x-form-label for="first_name" label="First Name" required="true" />
                                                <x-form-input 
                                                type="text" 
                                                id="first_name"
                                                placeholder="Enter first name"
                                                name="profileForm.firstName" 
                                                wire:model.blur="profileForm.firstName" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <x-form-label for="last_name" label="Last Name" required="true" />
                                                <x-form-input 
                                                type="text" 
                                                id="last_name"
                                                placeholder="Enter last name"
                                                name="profileForm.lastName" 
                                                wire:model.blur="profileForm.lastName" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <x-form-label for="age" label="Age" required="true" />
                                        <x-form-input 
                                        type="number" 
                                        id="age"
                                        step="1"
                                        placeholder="Enter age"
                                        name="profileForm.age" 
                                        wire:model.blur="profileForm.age" />
                                    </div>

                                    <div class="mb-3">
                                        <x-form-label for="birthday" label="Birthday" required="true" />
                                        <x-form-input 
                                        type="date" 
                                        id="birthday"
                                        name="profileForm.birthday" 
                                        wire:model.blur="profileForm.birthday" />
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between text-center text-lg-start mt-4 pt-2 gap-2">
                                    @if($isNext)
                                        <x-button type="submit"
                                            class="btn-lg d-flex justify-content-between align-items-center"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                            <div wire:loading wire:target="register">
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                            </div>
                                            <div wire:loading.remove wire:target="register">
                                                Register
                                            </div>
                                        </x-button>
                                    @else
                                        <x-button type="button"
                                        class="btn-lg d-flex justify-content-between align-items-center"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;"
                                        wire:click="next">
                                            <div wire:loading wire:target="next">
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                            </div>
                                            <div wire:loading.remove wire:target="next">
                                                Next
                                            </div>
                                        </x-button>
                                    @endif
                                    <p class="small fw-bold mt-2 pt-1 mb-0 text-center">
                                        Already have an account?
                                        <a href="{{ route('auth.login') }}" class="link-info" wire:navigate>Login</a>
                                    </p>
                                </div>
                            </form>

                            <hr class="text-primary">

                            <div
                                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="fw-bold mb-0 me-3">Sign up with:</p>

                                <x-button class="rounded-circle shadow-sm mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </x-button>

                                <x-button class="rounded-circle shadow-sm mx-1">
                                    <i class="fab fa-google"></i>
                                </x-button>

                                <x-button class="rounded-circle shadow-sm mx-1">
                                    <i class="fab fa-twitter"></i>
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
