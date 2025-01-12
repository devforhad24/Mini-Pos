@extends('layout.app')

@section('content')

<div class="row clearfix page_header">
    <div class="col-md-4">
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    </div>
    <div class="col-md-8 text-right">
        <a href="{{ url('users') }}" class="btn-sm btn-info"><i class="fa fa-plus"></i> New Sale</a>
        <a href="{{ url('users') }}" class="btn-sm btn-info"><i class="fa fa-plus"></i> New Purchase</a>
        <a href="{{ url('users') }}" class="btn-sm btn-info"><i class="fa fa-plus"></i> New Payment</a>
        <a href="{{ url('users') }}" class="btn-sm btn-info"><i class="fa fa-plus"></i> New Receipt</a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}</h6>
    </div>
    <div class="card-body">
        <div class="row clearfix justify-content-md-center">
            <div class="col-md-8">
                <table class="table table-borderless table-striped">
                    <tr>
                        <th class="text-right">Group :</th>
                        <td><span class="badge badge-danger">{{ $user->group->title }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-right">Name :</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Phone :</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Email :</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Address :</th>
                        <td>{{ $user->address }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection