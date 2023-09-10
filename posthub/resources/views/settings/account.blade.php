@extends('settings.index')
@section('title', 'Account')

@section('content')
   <h1 class="fw-bold mb-0">
      Account
   </h1>
   <small>Configure your account here</small>
   <hr class="text-primary fw-bold">
   <div class="row gx-1">
      <div class="col-md-4">
         <h6 class="fw-bold">Account Information</h6>
         <livewire:settings.account-settings/>
      </div>
   </div>
@endsection