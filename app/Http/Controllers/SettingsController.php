<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings', ["userData" => Auth::user()]);
    }

    public function changeUsername(Request $request){
        $user = Auth::user();
        $user->name = $request->username;
        $user->save();
        return "Sikeres névváltoztatás! <br> Az oldal 3 másodpercen belül újratöltődik és a változtatások életbelépnek.";
    }

    public function changeHomename(Request $request){
        $user = Auth::user();
        $user->homeName = $request->homeName;
        $user->save();
        return "Az otthon nevének megváltoztatása sikeres! <br> Az oldal 3 másodpercen belül újratöltődik és a változtatások életbelépnek.";
    }
}
