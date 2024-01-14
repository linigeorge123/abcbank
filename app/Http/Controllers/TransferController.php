<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaction;

class TransferController extends Controller
{
    public function index()
    {
        return view('transfer');
    }
    public function transfer(Request $request)
    {
        $user = Auth::user()->id;
       
        $from = User::where('id',$user)->first();
        if($from->email==$request->toEmail)
        {
            return redirect()->back()->with('error', "please enter another account!");
        }
     
        $to = User::where('email',$request->toEmail)->first();
        
        if($to){
            $transactionFrom = Transaction::select('balance')->where('user_id',$user)->orderBy('id','desc')->first();
            $transactionTo = Transaction::select('balance')->where('user_id',$to->id)->orderBy('id','desc')->first();
            
            if($transactionTo){
                $balanceto = (int)$transactionTo->balance;
            }else{
                $balanceto = 0;
            }

            if($transactionFrom){
                $balanceFrom = (int)$transactionFrom->balance;
            }else{
                $balanceFrom = 0;
            }

            if($balanceFrom == 0 || $balanceFrom < $request->transfer){
                return redirect()->back()->with('error', "You don't have enough balance!");
            }else{
                $amountFrom = $balanceFrom - $request->transfer;
            
                $trans1          = new Transaction;
                $trans1->user_id = $user;
                $trans1->amount = $request->transfer;
                $trans1->type = "Debit";
                $trans1->details = "Transfer to ".$request->toEmail;
                $trans1->balance = $amountFrom;
                $trans1->save();

                $amountto = $balanceto + $request->transfer;

                $trans2          = new Transaction;
                $trans2->user_id = $to->id;
                $trans2->amount = $request->transfer;
                $trans2->type = "Credit";
                $trans2->details = "Transfer from ".$from->email;
                $trans2->balance = $amountto;
                $trans2->save();
            }
        }else{
            return redirect()->back()->with('error', "Account for given email doesn't exists!");
        }

        return redirect()->back()->with('success', 'Transaction completed Sucessfully');
    }
}
