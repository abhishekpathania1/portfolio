@extends('layouts.app')

@section('content')
<div class="row mr-0">
    @include('layouts.admin.sidebar')
    <div class="col-md-8 m-5">

        <div class="card">
            <div class="card-header">Designs</div>

            <table class="table">
                <tr>
                    <th>Portfolio</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                <tbody>
                    {{-- {{ $data }} --}}
                    @foreach ($data as $value)
                    <tr>
                        <td>{{ $value->portfolio->title }}</td>
                        <td>{{ $value->user->name }}</td>
                        <td class="w-25">
                            <form class="inline" action="{{ route('proposal.destroy', $value->id) }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <a class="btn btn-primary" href="{{ route('proposal.show', $value->id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-warning" href="{{ route('proposal.edit', $value->id) }}">
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



