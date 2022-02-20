<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
class ChangePasswordController extends Controller
{
    public function __invoke(ChangePasswordRequest $request)
    {

        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->route('dashboard')->with("success","Password changed successfully!");

    }
}
