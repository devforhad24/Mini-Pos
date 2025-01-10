<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserGroupsController extends Controller
{
    // This method showing index page
    public function index(){
        $this->data['groups'] = Group::all();

        return view('groups.groups', $this->data);
    }   // ends method

    public function create(){
        return view('groups.create');
    }

    public function store(Request $request){
        $formdata = $request->all();

        if(Group::create($formdata)){
            Session::flash('message', 'Group Created Successfully');
        }

        return redirect()->to('groups');
    }

    public function destroy($id){
        if(Group::findOrFail($id)->delete()){
            Session::flash('message', 'Group Deleted Successfully');
        }

        return redirect()->to('groups');
    }

    
}
