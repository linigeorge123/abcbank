<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function perform()
    {
        Auth::logout();

        return redirect('login');
    }
}
