@extends('layouts.app')

@section('content')
 <div class="row mr-0">
     @include('layouts.admin.sidebar')
     <div class="container shadow p-5 mt-5">
         <h1 class="text-center mb-3">View Design</h1>
         <div class="row justify-content-center">
             <div class="col-md-8 text-center">
                 {{-- {{ $data->portfolioimages }} --}}
                 @foreach ($data->portfolioimages as $images)
                 <img class="img-responsive m-3" src="{{ $images->image }}" width="150" height="200">
                 @endforeach

                 <h1 class="m-3">{{ $data->title }}</h1>
                 <div class="des m-3">
                     {{ $data->description }}
                 </div>
             </div>
         </div>
     </div>

 </div>

@endsection





