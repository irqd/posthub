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
               <ul x-data class="list-group">
                  <template x-for="i in 10">
                     <li class="my-3 d-flex justify-content-between align-items-start" style="list-style-type: none;">
                        <span class="text-muted">
                           Topic <span x-text="i"></span>
                        </span>
                        <span class="badge rounded-pill text-bg-primary d-flex align-items-center">
                           <span x-text="i"></span>
                        </span>
                     </li>
                  </template>
               </ul>
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
