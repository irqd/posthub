@extends('settings.index')
@section('title', 'Profile')

@section('content')
   <h1 class="fw-bold mb-0">
      Public Profile
   </h1>
   <small>This is how others will see you on the site.</small>
   <hr class="text-primary fw-bold">
   <div class="row gx-1">
      <div class="col-md-8 order-sm-1 order-2">
         <livewire:settings.personal-profile />
      </div>
      <div class="col-md-4 order-sm-2 order-1">
         Picture
      </div>
   </div>
@endsection