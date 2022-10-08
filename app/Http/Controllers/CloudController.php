<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Cloud\CloudFile;
use App\Models\Cloud\CloudMethod;

class CloudController extends Controller
{
    public function index()
    {
        return view('cloud');
    }

    public function getCloudFiles(Request $request){
        if(isset($request->directory)){

        }
        else{
            return CloudMethod::getRootDirectoryData();
        }
    }

}
