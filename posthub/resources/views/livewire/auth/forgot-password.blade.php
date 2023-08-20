<div class="my-5 d-flex justify-content-center">
    <div class="card mb-3 w-100 rounded-0">
        <div class="row g-0">
            <div class="col-md-7 col-lg-8">
                <img src="{{ asset('images/pencil2.jpg') }}" class="img-fluid h-100" alt="Login">
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="card-body h-100 p-lg-5">
                    <div class="d-flex flex-column w-100 h-100 justify-content-center align-items-center">
                        <div>
                            <h3 class="fw-bold text-center">Forgot Password</h3>
                            <hr>
                            <form wire:submit="send">
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

                                <div class="d-flex justify-content-between text-center text-lg-start mt-4 pt-2 gap-2">
                                    <x-button type="submit" class="btn-lg d-flex justify-content-between align-items-center" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                        <div wire:loading>
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        </div>
                                        <div wire:loading.remove>
                                            Send
                                        </div>
                                    </x-button>
                                    <p class="small fw-bold mt-2 pt-1 mb-0 text-center">
                                        Remember password?
                                        <a href="{{ route('auth.login') }}" class="link-info text" wire:navigate>Login</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
