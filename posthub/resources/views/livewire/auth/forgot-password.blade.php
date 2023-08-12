<div class="container-fluid my-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="{{ asset('images/forgot-password.svg') }}"
                class="img-fluid" alt="Login Image">
        </div>

        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <h3 class="fw-bold text-center">Forgot Password</h3>
            <hr>
            <form>

                <!-- Email input -->
                <div class="form-outline mb-3">
                    <label class="form-label fw-bold" for="form3Example3">
                       Registered email address<span class="text-danger">*</span>
                    </label>
                    <input type="email" id="form3Example3" class="form-control"
                        placeholder="Enter your registered email address" />
                    <small class="form-text">
                        We will send you a password reset link. It will expire in 24 hours.
                    </small>
                </div>

                <div class="d-flex justify-content-between text-center text-lg-start mt-4 pt-2">
                    <button type="button" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">
                        Send 
                    </button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">
                        Remember password? 
                        <a href="{{ route('auth.login') }}" class="link-info" wire:navigate>Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

