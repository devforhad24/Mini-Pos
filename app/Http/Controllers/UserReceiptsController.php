<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserReceiptsController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu'] = 'receipts';
    }

    public function index($id){
        $this->data['user'] = User::findOrFail($id);

        return view('users.receipts.receipts', $this->data);
    }

    public function store(ReceiptRequest $request, $user_id){
        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        if(Receipt::create($formData)){
            Session::flash('message', 'Receipt Added Successfully');
        }
        return redirect()->route('user.receipts', ['id' => $user_id]);
    }

    public function destroy($user_id, $receipt_id){
        if(Receipt::destroy($receipt_id)){
            Session::flash('message', 'Receipt Deleted Successfully');
        }
        return redirect()->route('user.receipts', ['id' => $user_id]);
    }

}
