<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['categories'] = Category::all();

        return view('category.categories', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['mode'] = 'Add New Category';
        $this->data['headline'] = 'Categories';

        return view('category.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $formdata = $request->all();
        if (Category::create($formdata)) {
            Session::flash('message', 'Category Added Successfully.');
        }
        return redirect()->to('categories');

       // return $request->all();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['category'] = Category::findOrFail($id);
        $this->data['mode'] = 'edit';
        $this->data['headline'] = 'Update Category';

        return view('category.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category   = Category::findOrFail($id);
        $category->title = $request->get('title');
        
        if ($category->save()) {
            Session::flash('message', 'Category Updated Successfully.');
        }
        return redirect()->to('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Category::find($id)->delete()) {
            Session::flash('message', 'Category Deleted Successfully.');
        }
        return redirect()->to('categories');
    }
}
