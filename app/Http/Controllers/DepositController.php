<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class DepositController extends Controller
{
    public function index()
    {
        return view('deposit');
    }
    public function deposit(Request $request)
    {
        $user = Auth::user()->id;
        $transaction = Transaction::select('balance')->where('user_id',$user)->orderBy('id','desc')->first();
        if($transaction){
            $balance = (int)$transaction->balance;
        }else{
            $balance = 0;
        }
        $amount = $request->deposit + $balance;
        $trans          = new Transaction;
        $trans->user_id = $user;
        $trans->amount = $request->deposit;
        $trans->type = "Credit";
        $trans->details = "Deposit";
        $trans->balance = $amount;
        $trans->save();

        return redirect()->back()->with('success', 'Saved Sucessfully');
    }
}
