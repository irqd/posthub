<div class="my-5 d-flex justify-content-center">
    <div class="card mb-3 w-100 rounded-0">
        <div class="row g-0">
            <div class="col-md-7 col-lg-8">
                <img src="{{ asset('images/pencil2.jpg') }}" class="img-fluid h-100" alt="Forgot Password">
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="card-body h-100 p-lg-5">
                    <div class="d-flex flex-column w-100 h-100 justify-content-center align-items-center">
                        <div class="w-100">
                            <h3 class="fw-bold text-center">Reset Password</h3>
                            <hr class="text-primary">

                            <x-alerts type="danger"></x-alerts>
                            <x-alerts type="success"></x-alerts>

                            <form wire:submit="submit">
                                @csrf
                                <x-form-input 
                                    type="hidden" 
                                    id="token" 
                                    placeholder="Enter your registered email" 
                                    name="token" 
                                    wire:model="token"
                                />

                                <div class="mb-3">
                                    <x-form-label 
                                        for="email" 
                                        label="Email" 
                                        required="true"
                                    />
                                    <x-form-input 
                                        type="email" 
                                        id="email" 
                                        placeholder="Enter your registered email" 
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

                                <div class="mb-3">
                                    <x-form-label 
                                        for="password_confirmation" 
                                        label="Confirm Password"
                                        required="true" 
                                    />

                                    <x-form-input 
                                        type="password" 
                                        id="password_confirmation"
                                        placeholder="Confirm your password" 
                                        name="password_confirmation"
                                        wire:model="password_confirmation" 
                                    />
                                </div>

                                <div class="d-flex justify-content-between text-center text-lg-start mt-4 pt-2 gap-2">
                                    <x-button type="submit" class="btn-lg d-flex justify-content-center align-items-center w-100" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                        <div wire:loading>
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        </div>
                                        <div wire:loading.remove>
                                            <span>Reset</span>
                                        </div>
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
