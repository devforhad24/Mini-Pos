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
                <h2>Update <span style="color: red;">{{ $product->title }}</span></h2>
            @else
                <h2>{{ $headline }}</h2>
            @endif
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('products') }}" class="btn-sm btn-warning"><i class="fa fa-minus"></i> BACK</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $headline }}</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    @if ($mode == 'edit')
                        {{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) }}
                    @else
                        {{ Form::open(['route' => 'products.store', 'method' => 'post']) }}
                    @endif

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right col-form-label">Title<span
                                class="text-danger">*</span></label>
                        {{-- {{ Form::label('email','E-Mail Address'); }} --}}
                        <div class="col-sm-9">
                            {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Title']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-right col-form-label">Description<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Description']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right col-form-label">Category<span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-6">
                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'group', 'placeholder' => 'Select Category']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-right col-form-label">Cost Price</label>
                        <div class="col-sm-6">
                            {{ Form::text('cost_price', null, ['class' => 'form-control', 'id' => 'cost_price', 'placeholder' => 'Cost Price']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-3 text-right col-form-label">Sale Price</label>
                        <div class="col-sm-6">
                            {{ Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Price']) }}
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
