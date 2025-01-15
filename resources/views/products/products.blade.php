@extends('layout.app')

@section('content')

<div class="row clearfix page_header">
    <div class="col-md-6">
        <h2>Product List</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('products.create') }}" class="btn-sm btn-info"><i class="fa fa-plus"></i> New Product</a>
    </div>
</div>

{{-- data table --}}
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Cost Price</th>
                        <th>Sale Price</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SL No.</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Cost Price</th>
                        <th>Sale Price</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $key=> $product)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><span class="badge badge-success">{{ $product->category->title }}</span></td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->cost_price }}</td>
                        <td>{{ $product->price }}</td>
                        <td class="text-right">
                            
                            <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                                {{-- just for design --}}
                                <a class="btn-sm btn btn-warning" href="{{ route('products.show', ['product' => $product->id]) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn-sm btn btn-success" href="{{ route('products.edit', ['product' => $product->id]) }}"><i class="fa fa-edit"></i></a>
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