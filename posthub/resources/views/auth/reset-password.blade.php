<x-layout>
   <x-slot:title>
      PostHub: Password Reset
   </x-slot>
   
   <div class="d-flex justify-content-center align-items-center">
      <livewire:auth.reset-password :token="$token"/>
   </div>   
</x-layout>