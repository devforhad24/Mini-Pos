@extends('layout.app')

@section('content')

<div class="row clearfix page_header">
    <div class="col-md-6">
        <h2>User Groups</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('groups/create') }}" class="btn-sm btn-info"><i class="fa fa-plus"></i> New Group</a>
    </div>
</div>

{{-- data table --}}
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Title</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SL No.</th>
                        <th>Title</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($groups as $key=> $group)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $group->title }}</td>
                        <td class="text-right">
                            <form action="{{ url('groups/' .$group->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you want to sure?')" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
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