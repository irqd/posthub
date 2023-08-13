<div class="container-fluid my-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="{{ asset('images/login.svg') }}"
                class="img-fluid" alt="Login Image">
        </div>

        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <h3 class="fw-bold text-center">Login</h3>

            <hr>
            
            <form wire:submit="login">
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

                <div class="mb-3">
                    <x-form-label 
                        for="password" 
                        label="Password" 
                        required="true"
                    />
                    <x-form-input 
                        type="password" 
                        id="password" 
                        placeholder="Enter a valid password" 
                        name="password" 
                        wire:model="password"
                    />
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                        <label class="form-check-label" for="form2Example3">
                            Remember me
                        </label>
                    </div>
                    <a href="{{ route('auth.forgot-password') }}" class="text-body" wire:navigate>Forgot password?</a>
                </div>

                <div class="d-flex justify-content-between text-center text-lg-start mt-4 pt-2">
                    <x-button type="submit" class="btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                        Login
                    </x-button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">
                        Don't have an account? 
                        <a href="{{ route('auth.register') }}" class="link-info" wire:navigate>Register</a>
                    </p>
                </div>
            </form>

            <hr>

            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <p class="lead fw-normal mb-0 me-3">Sign in with:</p>

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

