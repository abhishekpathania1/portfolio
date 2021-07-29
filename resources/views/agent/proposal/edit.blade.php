@extends('layouts.app')

@section('content')

<div class="row mr-0">
    @include('layouts.admin.sidebar')
    <div class="col-md-9 shadow  p-5 mt-5">
        <div class="row">
            <div class="col md-12 m-3">
                <div class="d-flex justify-content-between bg-dark text-light p-4">
                    <div class="col-md-6">
                        <h2>Proposal</h2>
                        <p>Portfolio Name: {{ $data->portfolio->title }}</p>
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

        @if($data->userpayment)
        <div class="row">
            <div class="col-md-12">
                <h2 class="bg-dark text-light p-4">Proposal Request Payment Status</h2>
                <div class="border p-5 m-3">
                    <form method="post" action="{{ route('payment.update',$data->userpayment->id) }}">

                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="manual">Type</label>
                            <input type="text" id="manual" class="form-control" value="{{ $data->userpayment->type }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="amt">Ammount</label>
                            <input type="text" id="amt" class="form-control" value="{{ $data->userpayment->amount }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            @if ( $data->userpayment->status == 'Accept' || $data->userpayment->status == 'Decline' )
                            <select class="form-control" id="status" name="status" readonly>
                                <option value="">{{ $data->userpayment->status }}</option>
                            </select>

                            @else
                            <select class="form-control" id="status" name="status">
                                <option value="">--Select--</option>
                                <option value="Accept">Accept</option>
                                <option value="Decline">Decline</option>
                            </select>
                            @endif
                            @error('status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="amt">Receipt Image</label><br>
                            <img src="{{ $data->userpayment->userpaymentimage->image}}" class="border p-2 m-2" width="200" height="200">
                        </div>
                        @if ( $data->userpayment->status == 'Accept' || $data->userpayment->status == 'Decline' )

                        <input name="submit" id="submit" class="btn btn-primary" type="submit" disabled>
                        @else
                        <input name="submit" id="submit" class="btn btn-primary" type="submit">

                        @endif
                    </form>
                </div>
            </div>
        </div>


        @if ( $data->userpayment->status == 'Accept' )

        <div class="row proposal">
            <div class="col-md-12">
                <div class="border p-5 m-3">
                    <h2 class="bg-dark text-light p-4">Proposal</h2>

                    <div class="form-group">
                        <label for="amt">Price</label>
                        <input type="text" id="amt" class="form-control" value="100">
                    </div>
                    <div class="form-group">
                        <label for="amt">Comments</label>
                        <textarea class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="amt">Status</label>
                        <select name="status" class="form-control">
                            <option value="">--Select--</option>
                            <option value="">Selected</option>
                            <option value="">Rejected</option>
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="amt">Attachment</label>
                        <input type="file" id="attachment">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary">
                </div>
            </div>
        </div>

        <div id="pro"></div>
        <button type="submit" class="btn btn-dark add">Add Proposal</button>
        @endif
        @endif
    </div>
</div>

@endsection

<script>
       var counter = 0;
    $(document).ready(function() {
        $('#submit').click(function() {
            $('.proposal,.add').show();
        });
        if (counter == 3) {
            $('.add').hide();
        } else {
            $('.add').click(function() {
                $('.proposal').last().clone().appendTo("#pro");
            });
        }
    });

</script>
