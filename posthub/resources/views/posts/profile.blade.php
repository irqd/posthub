<x-layout>
   <x-slot:title>
      PostHub: Profile
   </x-slot>

   <x-toast />

   <div class="row justify-content-center align-items-start">
      <div class="d-none d-md-block col-md-3 p-3 vh-100">
         <div class="d-flex flex-column align-items-start">
            <div class="position-fixed">
               <h6 class="fw-bold">Topics</h6>
               <livewire:post.list-topic />
            </div>
         </div>
      </div>
      <div class="col-md-6 p-3" style="max-height: 100%">
         
         <h6 class="fw-bold">{{ $username }}'s Profile</h6>
         
         <x-user-hero :user-id="$user_id"/>

         @if($user_id == auth()->user()->id)
            <h6 class="fw-bold mt-3">Create Post</h6>
            <livewire:post.create-post />
         @endif

         <hr>

         <livewire:post.list-post-by-profile :user_id="$user_id"/>
      </div>
      <div class=" d-none d-md-block col-md-3 p-3">
         <div class="position-fixed">
            Updates
         </div>
      </div>
   </div>
</x-layout>
