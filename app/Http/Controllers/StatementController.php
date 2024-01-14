<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class StatementController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $statements=Transaction::where('user_id',$user)->get();
        return view('statement',compact('statements'));

    }
}
