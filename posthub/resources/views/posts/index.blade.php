<x-layout>
   <x-slot:title>
      PostHub: Home
   </x-slot>

   <x-slot:styles>
      <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
   </x-slot>

   <x-toast />

   <div class="row justify-content-center align-items-start">
      <div class="d-none d-md-block col-md-3 p-3 ">
         <div class="d-flex flex-column align-items-start w-100">
            <h5 class="fw-bold">Topics</h5>
            <ul x-data class="list-group w-100">
               <template x-for="i in 10">
                  <li class="my-3 d-flex justify-content-between align-items-start" style="list-style-type: none;">
                     <span class="text-muted">
                        Topic <span x-text="i"></span>
                     </span>
                     <span class="badge rounded-pill text-bg-primary">
                        <span x-text="i"></span> posts
                     </span>
                  </li>
               </template>
            </ul>
         </div>
      </div>
      <div class="col-md-6 p-3">
         <h5 class="fw-bold">Create post</h5>
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

   <x-slot:scripts>
      <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
   </x-slot>
</x-layout>
