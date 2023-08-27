<x-layout>
   <x-slot:title>
      PostHub: Email Verification
   </x-slot>
   
   <div class="d-flex justify-content-center align-items-center">
      <div class="card border-0">
         <div class="card-body p-5">
            <h1 class="card-title text-center" style="font-size: 6rem;">
               <i class="fa-solid fa-envelope-circle-check"></i>  
            </h1>
            <h1 class="text-center">Verify your email...</h1>
            <p class="text-center">
               Thanks for signing up! Before getting started, please verify your email address by clicking on the link that we have sent.
            </p>
            <p class="text-center">If you did not receive the email, <a href="{{ route('verification.send') }}" class="link-info">click here to request another</a>.</p>
         </div>
      </div>
   </div>   
</x-layout>