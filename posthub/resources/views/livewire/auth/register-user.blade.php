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
                            <!-- Username input -->
                            <div class="mb-3">
                                <x-form-label 
                                    for="username" 
                                    label="Username" 
                                    required="true"
                                />
                                <x-form-input 
                                    type="text" 
                                    id="username" 
                                    placeholder="Enter a unique username"
                                    name="username" 
                                    wire:model="username"
                                />
                            </div>
            
                            <!-- Email input -->
                            <div class="mb-3">
                                <x-form-label 
                                    for="email" 
                                    label="Email" 
                                    required="true"
                                />
                                <x-form-input 
                                    type="email" 
                                    id="email" 
                                    placeholder="Enter a valid email address"
                                    name="email" 
                                    wire:model="email"
                                />
                            </div>
            
                            <!-- Birthday input -->
                            {{-- <div class="mb-3">
                                <x-form-label 
                                    for="birthday" 
                                    label="Birthday" 
                                    required="true"
                                />
                                <x-form-input 
                                    type="date" 
                                    id="birthday" 
                                    name="birthday" 
                                    wire:model="birthday"
                                />
                            </div> --}}
            
                            <!-- Password input -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <x-form-label 
                                    for="password" 
                                    label="Password" 
                                    required="true"
                                    />

                                    <small>
                                        min. 8 characters
                                    </small>
                                </div>
                                <x-form-input 
                                    type="password" 
                                    id="password" 
                                    placeholder="Enter a strong password"
                                    name="password" 
                                    wire:model="password"
                                />
                            </div>
            
                            <!-- Password input -->
                            <div class="mb-3">
                                <x-form-label 
                                for="confirm_password" 
                                label="Confirm Password" 
                                required="true"
                                />

                                <x-form-input 
                                    type="confirm_password" 
                                    id="confirm_password" 
                                    placeholder="Confirm your password"
                                    name="confirm_password" 
                                    wire:model="confirm_password"
                                />
                            </div>
            
                            <div class="d-flex justify-content-between text-center text-lg-start mt-4 pt-2 gap-2">
                                <x-button type="submit" class="btn-lg d-flex justify-content-between align-items-center" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                    <div wire:loading>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </div>
                                    <div wire:loading.remove>
                                        Resgister
                                    </div>
                                </x-button>
                                <p class="small fw-bold mt-2 pt-1 mb-0 text-center">
                                    Already have an account? 
                                    <a href="{{ route('auth.login') }}" class="link-info" wire:navigate>Login</a>
                                </p>
                            </div>
                        </form>
            
                        <hr class="text-primary">
            
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
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

