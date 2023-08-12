<div class="container-fluid my-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="{{ asset('images/register.svg') }}"
                class="img-fluid" alt="Register Image">
        </div>

        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <h3 class="fw-bold text-center">Register</h3>
            <hr>
            <form>
                <!-- Username input -->
                <div class="form-outline mb-3">
                    <label class="form-label fw-bold" for="form3Example3">
                        Username<span class="text-danger">*</span>
                    </label>
                    <input type="email" id="form3Example3" class="form-control"
                        placeholder="Enter a unique username" />
                </div>

                <!-- Email input -->
                <div class="form-outline mb-3">
                    <label class="form-label fw-bold" for="form3Example3">
                        Email address <span class="text-danger">*</span>
                    </label>
                    <input type="email" id="form3Example3" class="form-control"
                        placeholder="Enter a unique email address" />
                </div>

                <!-- Birthday input -->
                <div class="form-outline mb-3">
                    <div class="d-flex justify-content-between">
                        <label class="form-label fw-bold" for="form3Example3">
                            Birthday<span class="text-danger">*</span>
                        </label>
                        <small class="form-text">verify your over 18</small>
                    </div>
                    <input type="date" id="form3Example3" class="form-control"/>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <div class="d-flex justify-content-between">
                        <label class="form-label fw-bold" for="form3Example4">
                            Password <span class="text-danger">*</span>
                        </label>
                        <small class="form-text">
                            min: 8 characters
                        </small>
                    </div>
                    
                    <input type="password" id="form3Example4" class="form-control"
                        placeholder="Enter password" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label fw-bold" for="form3Example4">
                        Confirm Password <span class="text-danger">*</span>
                    </label>
                    <input type="password" id="form3Example4" class="form-control"
                        placeholder="Confirm password" />
                </div>

                <div class="d-flex justify-content-between text-center text-lg-start mt-4 pt-2">
                    <button type="button" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">
                        Register
                    </button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">
                        Already have an account? 
                        <a href="{{ route('auth.login') }}" class="link-info" wire:navigate>Login</a>
                    </p>
                </div>
            </form>

            <hr>

            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <p class="lead fw-normal mb-0 me-3">Sign up with:</p>
                <button type="button" class="btn btn-primary rounded-5 shadow-sm mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-primary rounded-5 shadow-sm mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-primary rounded-5 shadow-sm mx-1">
                    <i class="fab fa-twitter"></i>
                </button>
            </div>
        </div>
    </div>
</div>

