<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerMainController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('customer/dashboard', compact('user'));
    }

    public function profile()
    {
        return view('customer/update-password');
    }
}
