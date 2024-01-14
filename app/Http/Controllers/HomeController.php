<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        
        $user = User::select('name','email')->where('id',$id)->first();

        $transaction = Transaction::select('balance')->where('user_id',$id)->orderBy('id','desc')->first();
        
        if($transaction){
            $balance = $transaction->balance; 
        }else{
            $balance = 0;
        }

        return view('home',['id' => $id,'user' => $user,'balance' => $balance]);
    }
}
