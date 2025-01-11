@extends('layout.app')

@section('content')

<div class="row clearfix page_header">
    <div class="col-md-6">
        <h2>User List</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('users/create') }}" class="btn-sm btn-info"><i class="fa fa-plus"></i> New User</a>
    </div>
</div>

{{-- data table --}}
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Group</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SL No.</th>
                        <th>Group</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $key=> $user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><span class="badge badge-danger">{{ $user->group->title }}</span></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td class="text-right">
                            
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                {{-- just for design --}}
                                <a class="btn-sm btn btn-success" href="{{ route('users.edit', ['user' => $user->id]) }}"><i class="fa fa-edit"></i></a>
                                {{-- ends --}}
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you want to sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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