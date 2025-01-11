@extends('layout.app')

@section('content')

    {{-- error message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row clearfix page_header">
        <div class="col-md-6">
            @if ($mode == 'edit')
                <h2>Update <strong style="color: red;">{{ $user->name }}</strong> Information</h2>
            @else
                <h2>{{ $headline }}</h2>
            @endif
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('users') }}" class="btn-sm btn-warning"><i class="fa fa-minus"></i> BACK</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $headline }}</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    @if ($mode == 'edit')
                        {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) }}
                    @else
                        {{ Form::open(['route' => 'users.store', 'method' => 'post']) }}
                    @endif

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Group <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            {{ Form::select('group_id', $groups, null, ['class' => 'form-control', 'id' => 'group', 'placeholder' => 'Select User Group']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name <span
                                class="text-danger">*</span></label>
                        {{-- {{ Form::label('email','E-Mail Address'); }} --}}
                        <div class="col-sm-10">
                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email </label>
                        <div class="col-sm-10">
                            {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Address']) }}
                        </div>
                    </div>
                    <div class="mt-4 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
