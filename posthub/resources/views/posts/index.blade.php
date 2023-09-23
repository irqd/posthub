<x-layout>
   <x-slot:title>
      PostHub: Home
   </x-slot>

   <x-slot:styles>
      <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
   </x-slot>

   <div class="d-flex justify-content-center align-items-start">
      <div class="row gx-3 w-100">
         <div class="col-md-3 p-3 d-none d-md-block">
               <div class="position-fixed">
                  Topic List
               </div>
         </div>
         <div class="col-md-6 p-3">
            <h5 class="fw-bold">Create post</h5>
            <div class="d-flex flex-column align-items-center w-100">
               <div 
                  class="w-100" 
                  x-data 
                  x-init="quill = new Quill($refs.editor, {
                     theme: 'snow'
                  });
                  
                  // target ql-toolbar class then apply bootstrap classes
                  let editorToolbar = $refs.editor.previousElementSibling;
                  editorToolbar.classList.add(
                     'shadow-sm',
                     'mb-2',
                     'rounded-3',
                  );
                  
                  // target ql-container class then apply bootstrap classes
                  let editorContainer = $refs.editor;
                  editorContainer.classList.add(
                     'border-top',
                     'p-0',
                     'rounded-3',
                     'shadow-sm',
                     'pt-2',
                  );
                  
                  // remove disabled class from publish button when editor is not empty
                  // and add disabled class when editor is empty
                  quill.on('text-change', function() {
                     if (quill.getLength() > 1) {
                        document.getElementById('publish_button').classList.remove('disabled');
                     } else {
                        document.getElementById('publish_button').classList.add('disabled');
                     }
                  });

                  // teleport word counter to ql-editor upper right corner
                  let wordCounter = document.getElementById('char_counter');
                  editorContainer.appendChild(wordCounter);
                  wordCounter.classList.add(
                     'position-absolute',
                     'top-0',
                     'end-0',
                     'pt-1',
                     'pe-2',
                     'text-muted',
                     'small',
                  );
                  
                  // count characters
                  quill.on('text-change', function() {
                     let text = quill.getText();
                     let charCount = text.length - 1;
                     document.getElementById('char_counter').innerHTML = charCount + '/1000';
                  });
               "> 
                  <div id="char_counter" class="text-body-emphasis">
                     0/1000
                  </div>
                  <div id="editor" x-ref="editor">
                  </div>
               </div>
               <button class="btn btn-primary mt-1 w-100 disabled" id="publish_button">
                  Publish
               </button>
            </div>

            <hr>

            {{-- temp data --}}
            <div class="d-flex flex-column gap-3">
               <div x-data class="d-flex flex-column gap-3">
                  <template x-for="i in 10">
                     <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                     </div>
                  </template>
               </div>
            </div>
         </div>
         <div class="col-md-3 p-3 d-none d-md-block">
            <div class="position-fixed">
               Recent Posts
            </div>
         </div>
      </div>
   </div>

   <x-slot:scripts>
      <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
   </x-slot>
</x-layout>
