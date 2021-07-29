@extends('layouts.app')

@section('content')
<div class="row mr-0">
    @include('layouts.admin.sidebar')
    <div class="col-md-8 m-5">
       
        <div class="card">
            <div class="card-header">Designs</div>
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <tbody>

                    @foreach ($data as $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td class="w-25">
                            <form class="inline" action="{{ route('portfolio.destroy', $value->id) }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <a class="btn btn-primary" href="{{ route('portfolio.show', $value->id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-warning" href="{{ route('portfolio.edit', $value->id) }}">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

