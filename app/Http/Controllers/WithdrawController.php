<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class WithdrawController extends Controller
{
    public function index()
    {
        return view('withdraw');
    }
    public function withdraw(Request $request)
    {
        $user = Auth::user()->id;
        $transaction = Transaction::select('balance')->where('user_id',$user)->orderBy('id','desc')->first();
        
        if($transaction){
            $balance = (int)$transaction->balance;
        }else{
            $balance = 0;
        }

        if($balance == 0 || $balance < $request->withdraw){
            return redirect()->back()->with('error', "You don't have enough balance!");
        }else{
            $amount = $balance - $request->withdraw;
        
            $trans          = new Transaction;
            $trans->user_id = $user;
            $trans->amount = $request->withdraw;
            $trans->type = "Debit";
            $trans->details = "Withdraw";
            $trans->balance = $amount;
            $trans->save();
        }

        return redirect()->back()->with('success', 'Saved Sucessfully');
    }
}
