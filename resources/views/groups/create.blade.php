@extends('layout.app')

@section('content')

<div class="row clearfix page_header">
    <div class="col-md-6">
        <h2>Create New Group</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('groups') }}" class="btn-sm btn-info"><i class="fa fa-minus"></i> BACK</a>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form action="{{ url('groups') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="title">User Group Title</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="User Group Title">
                      <small id="emailHelp" class="form-text text-muted">We'll share user group title.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection