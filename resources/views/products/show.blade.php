@extends('layout.app')

@section('content')

<div class="row clearfix page_header">
    <div class="col-md-4">
        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $product->title }}</h6>
    </div>
    <div class="card-body">
        <div class="row clearfix justify-content-md-center">
            <div class="col-md-12">
                <table class="table table-borderless table-striped">
                    <tr>
                        <th class="text-right">Category:</th>
                        <td><span class="badge badge-danger">{{ $product->category->title }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-right">Title:</th>
                        <td>{{ $product->title }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Description:</th>
                        <td style="text-align: justify;">{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Const Price:</th>
                        <td>{{ $product->cost_price }} <strong>BDT</strong> </td>
                    </tr>
                    <tr>
                        <th class="text-right">Sale Price:</th>
                        <td>{{ $product->price }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection