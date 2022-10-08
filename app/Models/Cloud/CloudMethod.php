<?php

namespace App\Models\Cloud;
use Storage;
class CloudMethod
{
    public $name;
    public $extension;
    public $size;
    public $path;
    public $lastModified;

    public static function getRootDirectoryData(){       
        $detailedFileData = [];
        $storedDirectories = Storage::disk('local')->directories();
        $storedFiles = Storage::files();

        foreach ($storedFiles as $file){
            $fileDetailed = new CloudFile();
            $fileDetailed->name = $file;
            $fileDetailed->size = Storage::size($file);
            $fileDetailed->extension = explode('.',$file)[1];
            $fileDetailed->path = $file;
            $fileDetailed->lastModified = Storage::lastModified($file);
            array_push($detailedFileData,$fileDetailed);
        }

        return $detailedFileData;
    }

    public static function getDirectoryData($directory){

    }
}













