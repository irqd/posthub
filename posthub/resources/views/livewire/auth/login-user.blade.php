<div class="my-5 d-flex justify-content-center">
    <div class="card mb-3 w-100 rounded-0">
        <div class="row g-0">
          <div class="col-md-7 col-lg-8">
            <img src="{{ asset('images/login.jpg') }}" class="img-fluid h-100" alt="Login">
          </div>
          <div class="col-md-5 col-lg-4">
            <div class="card-body h-100 p-lg-5">
                <div class="d-flex flex-column w-100 h-100 justify-content-center align-items-center">
                    <div>
                        <h3 class="fw-bold text-center">Login</h3>
                        <hr class="text-primary">

                        <x-alerts type="danger"></x-alerts>
                        
                        <form wire:submit="login">
                            <div class="mb-3">
                                <x-form-label 
                                    for="usernameOrEmail" 
                                    label="Username or Email" 
                                    required="true"
                                />
                                <x-form-input 
                                    type="text" 
                                    id="usernameOrEmail" 
                                    placeholder="Enter registered username or email" 
                                    name="form.usernameOrEmail" 
                                    wire:model="form.usernameOrEmail"
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
                                    name="form.password" 
                                    wire:model="form.password"
                                />
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" id="remember" wire:model="remember"/>
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="{{ route('auth.forgot-password') }}" class="text-body" wire:navigate>Forgot password?</a>
                            </div>
            
                            <div class="d-flex justify-content-between text-center text-lg-start mt-4 pt-2 gap-2">
                                <x-button type="submit" class="btn-lg d-flex justify-content-between align-items-center" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                    <div wire:loading>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </div>
                                    <div wire:loading.remove>
                                        Login
                                    </div>
                                </x-button>
                                <p class="small fw-bold mt-2 pt-1 mb-0 text-center">
                                    Don't have an account? 
                                    <a href="{{ route('auth.register') }}" class="link-info text" wire:navigate>Register</a>
                                </p>
                            </div>
                        </form>
                        <hr class="text-primary">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="fw-bold mb-0 me-3">Sign in with:</p>
            
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

