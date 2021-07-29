@extends('layouts.app')

@section('content')

 <div class="row mr-0">
     @include('layouts.admin.sidebar')
     <div class="col-md-9 shadow">

    <h1 class="text-center mt-3">Design</h1>

            <form action="{{ route('portfolio.update',$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $data->title }}" class="form-control  mb-3">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <label>Description</label>
                        {{-- <input type="text" name="description" value="{{ $data->description }}" class="form-control  mb-3"> --}}
                        <textarea name="description" class="form-control mb-3">{{ $data->description }}</textarea>


                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <label>Price</label>
                        <input type="text" name="price" value="{{ $data->price }}" class="form-control mb-3">
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">

                        @error('images')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-10 offset-md-1">
                        <label>Image</label><br>
                        @foreach ($data->portfolioimages as $images)
                        <img class="img-responsive m-3" src="{{ $images->image }}" width="150" height="200">
                        @endforeach
                    </div>
                </div>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary m-3">
            </form>
        </div>
    </div>
</div>
@endsection


