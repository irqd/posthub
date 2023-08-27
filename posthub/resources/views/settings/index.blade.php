<x-layout>
   <x-slot:title>
      PostHub: Profile
   </x-slot>

   <div class="d-flex flex-column justify-content-sm-start justify-content-center align-items-center h-100">
      <div class="row w-100 mt-3">
         <h1 class="fw-bold mb-0">
            Settings
         </h1>
         <p class="text-muted">
            Manage your account settings, preferences, and personal information.
         </p>
         <small>
            <a href="{{ route('posts.index') }}" class="text-decoration-none link-info" wire:navigate>
               <i class="fa-solid fa-arrow-left me-2"></i>   
               <span class="fw-bold">Back to home</span>
            </a>
         </small>
      </div>
      <hr class="text-primary w-100">
      <div class="row w-100 gy-3">
         <div class="col-md-2 p-0">
            <ul class="nav flex-md-column gap-2 p-3 shadow rounded">
               <li class="nav-item">
                  <a href="{{ route('settings.profile') }}" 
                     class="btn btn-sm w-100 text-start {{ (request()->routeIs('settings.profile')) ? 'btn-primary' : 'btn-outline-primary' }}" 
                     wire:navigate
                  >
                     <i class="fa-solid fa-address-card"></i>
                     <span class="d-none d-sm-inline-block">Profile</span>
                  </a>
               </li>
               <li class="nav-item d-flex justify-content-between">
                  <a href="{{ route('settings.account') }}" 
                     class="btn btn-sm w-100 text-start {{ (request()->routeIs('settings.account')) ? 'btn-primary' : 'btn-outline-primary' }}" 
                     wire:navigate
                  >
                     <i class="fa-solid fa-user"></i>
                     <span class="d-none d-sm-inline-block">Account</span>
                  </a>
               </li>
               <li class="nav-item d-flex justify-content-between">
                  <a href="#" 
                  class="btn btn-sm w-100 text-start {{ (request()->routeIs('settings.appearance')) ? 'btn-primary' : 'btn-outline-primary' }}" 
                  wire:navigate
                  >
                     <i class="fa-solid fa-wand-magic-sparkles"></i> 
                     <span class="d-none d-sm-inline-block">Appearance</span>
                  </a>
               </li>
            </ul>
         </div>
         <div class="col-md-10">
            @yield('content')
         </div>
      </div>
   </div>
</x-layout>