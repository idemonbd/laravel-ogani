<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;


class AccountController extends Controller
{
    public function dashboard()
    {
        return view('back.dashboard');
    }
}
