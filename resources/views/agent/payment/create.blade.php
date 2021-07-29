@extends('layouts.app')

@section('content')
<div class="row mr-0">
    @include('layouts.admin.sidebar')
    <div class="col-md-8 shadow m-5">
        <h1 class="text-center mt-3">Bank Details</h1>

        <form id="bank-detail" action="{{ route('payment.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control  mb-3">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label>Account Number</label>
                    <input type="text" name="account_number" class="form-control mb-3">

                    @error('account')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label>IFSC Code</label>
                    <input type="text" name="ifsc" class="form-control mb-3">
                    @error('ifsc')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
          
<div class="text-center">
    <input type="submit" name="submit" id="submit-form" class="btn btn-primary m-3">
</div>

</form>
</div>
@endsection
{{-- jquery --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script>
    $(document).ready(() => {
        $("#submit-form").click(function(e) {
            e.preventDefault();
            var form = $("#bank-detail").serialize();
            $.ajax({
                url: "{{ route('payment.store') }}"
                , data: form
                , type: 'POST'
                , dataType: 'JSON'
                , success: function(res) {
                   data.(res);
                }
            });
        })

    })

</script>
