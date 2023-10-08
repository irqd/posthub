<x-layout>
   <x-slot:title>
      PostHub: Home
   </x-slot>

   <x-toast />

   <div class="row justify-content-center align-items-start">
      <div class="d-none d-md-block col-md-3 p-3 vh-100">
         <div class="d-flex flex-column align-items-start">
            <div class="position-fixed">
               <h5 class="fw-bold">Topics</h5>
               <livewire:post.list-topic />
            </div>
         </div>
      </div>
      <div class="col-md-6 p-3" style="max-height: 100%">
         {{-- create post --}}
         <h6 class="fw-bold">Create Post</h6>
         <livewire:post.create-post />
         <hr>

         {{-- list all post --}}
         <livewire:post.list-post />
      </div>
      <div class=" d-none d-md-block col-md-3 p-3">
         <div class="position-fixed">
            Updates
         </div>
      </div>
   </div>
</x-layout>
