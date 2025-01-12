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
                <h2>Update <strong style="color: red;">{{ $category->name }}</strong> Category</h2>
            @else
                <h2>{{ $headline }}</h2>
            @endif
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('categories.index') }}" class="btn-sm btn-warning"><i class="fa fa-minus"></i> BACK</a>
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
                        {{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put']) }}
                    @else
                        {{ Form::open(['route' => 'categories.store', 'method' => 'post']) }}
                    @endif

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title <span
                                class="text-danger">*</span></label>
                        {{-- {{ Form::label('email','E-Mail Address'); }} --}}
                        <div class="col-sm-10">
                            {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Title']) }}
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
