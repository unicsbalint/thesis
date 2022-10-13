<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            return CloudMethod::getDirectoryData($request->directory);
        }
        else{
            return CloudMethod::getRootDirectoryData();
        }
    }

    public function downloadFile(Request $request){
        return CloudMethod::downloadFile($request->path);
    }

    public function moveFile(Request $request){
        return CloudMethod::moveFile($request->fileToMove, $request->targetDirectory);
    }

}
