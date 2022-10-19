<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

class ChangePasswordController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function changePassword(Request $request){
        if(!$this->isOldPasswordValid($request->oldPassword)) throw new Exception("A régi jelszó nem megfelelő.");
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->newPassword)]);

        return "Sikeres jelszóváltoztatás!";
    }

    public function isOldPasswordValid($oldPassword){
        return Hash::check($oldPassword, auth()->user()->password);
    }
}
