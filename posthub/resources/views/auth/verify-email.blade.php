<x-layout>
   <x-slot:title>
      PostHub: Email Verification
   </x-slot>
   
   <div class="d-flex justify-content-center align-items-center h-100">
      <div class="card shadow-sm">
         <div class="card-body">
            <h1 class="text-center">Verify your email address</h1>
            <p class="text-center">Before proceeding, please check your email for a verification link.</p>
            <p class="text-center">If you did not receive the email, <a href="{{ route('verification.send') }}">click here to request another</a>.</p>
         </div>
      </div>
   </div>   
</x-layout>