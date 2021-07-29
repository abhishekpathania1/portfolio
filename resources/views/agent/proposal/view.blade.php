@extends('layouts.app')
@section('content')
<div class="row mr-0">
    @include('layouts.admin.sidebar')
    <div class="container shadow p-5 mt-5">

        <div class="row">
            <div class="col md-12">
                <div class="d-flex justify-content-between bg-dark text-light p-4">
                    <div class="col-md-6">
                        <h2>Portfolio</h2>
                        {{ $data->portfolio->title }}
                    </div>
                    <div class="col-md-6 text-right">
                        <h4 class="text-capitalize">By: {{ $data->user->name }}</h4>
                    </div>
                </div>
                <div class="content border m-2 p-5">
                    <h2>
                        Description:
                        <textarea class="form-control m-3" rows="4" disabled>{{ $data->description}}Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga amet ducimus enim recusandae iusto illo blanditiis
                        quae rerum officiis accusamus. Consequuntur ullam cumque doloremque magni, optio quos quidem expedita corrupti?
                        </textarea>
                    </h2>
                    @foreach ($data->proposalimages as $images)
                    <img src="{{ $images->image}}" class="border p-2 m-2" width="200" height="200">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
