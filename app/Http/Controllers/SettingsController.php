<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Cloud\CloudBackup;

class SettingsController extends Controller
{
    public function index()
    {
        $data = [];
        $data["userData"] = Auth::user();

        $backup = CloudBackup::select('*')->first();
        $data["backupInterval"] = $backup->backup_time_interval;
        
        return view('settings')->withData($data);
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

    public function changeBackupInterval(Request $request){
        $backup = CloudBackup::select('*')->first();
        $backup->backup_time_interval = $request->backupInterval;
        $backup->save();
        return "A biztonsági mentés intervallumának megváltoztatása sikeres!";
    }
}
