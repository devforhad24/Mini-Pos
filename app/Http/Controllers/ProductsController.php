<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['products'] = Product::all();

        return view('products.products', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['categories'] = Category::arrayForSelect();
        $this->data['mode'] = 'create';
        $this->data['headline'] = 'Add New Product';

        return view('products.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formdata = $request->all();
        if (Product::create($formdata)) {
            Session::flash('message', 'Product Created Successfully.');
        }
        return redirect()->to('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['product'] = Product::findOrFail($id);

        return view('products.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['product'] = Product::findOrFail($id);
        $this->data['categories'] = Category::arrayForSelect();
        $this->data['mode'] = 'edit';
        $this->data['headline'] = 'Update Product Information';

        return view('products.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $data   = $request->all();

        $product   = Product::findOrFail($id);
        $product->category_id = $data['category_id'];
        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->cost_price = $data['cost_price'];
        $product->price = $data['price'];
        
        if ($product->save()) {
            Session::flash('message', 'Product Updated Successfully.');
        }
        return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Product::destroy($id)){
            Session::flash('message', 'Product Deleted Successfully!');
        }

        return redirect()->to('products');
    }
}
