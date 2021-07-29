@extends('layouts.app')

@section('content')
<div class="row mr-0">
    @include('layouts.admin.sidebar')
    <div class="col-md-8 shadow m-5">
        <h1 class="text-center mt-3">Design</h1>

        <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control  mb-3">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label>Description</label>
                    <textarea name="description" class="form-control  mb-3"></textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control mb-3">
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label class="mt-3">Image</label>
                    <input type="file" name="images[]" multiple="multiple">
                    @error('images')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary m-3">
            </div>

        </form>
    </div>
    @endsection




    