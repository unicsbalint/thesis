<?php

namespace App\Models\Cloud;
use Storage;
class CloudMethod
{

    public static function getRootDirectoryData(){       
        $detailedFileData = [];

        $storedDirectories = Storage::disk('local')->directories();
        $storedFiles = Storage::files();

        //Mappák hozzáadása
        foreach($storedDirectories as $directory){
            $directoryDetailed = new CloudFile();
            $directoryDetailed->name = $directory;
            $directoryDetailed->size = Storage::size($directory);
            $directoryDetailed->extension = "folder";
            $directoryDetailed->path = $directory;
            $directoryDetailed->lastModified = Storage::lastModified($directory);
            array_push($detailedFileData,$directoryDetailed);
        }
        // Fájlok hozzáadása
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
        $detailedFileData = [];

        $storedDirectories = Storage::directories($directory);
        $storedFiles = Storage::files($directory);

        //Mappák hozzáadása
        foreach($storedDirectories as $directory){
            $directoryDetailed = new CloudFile();
            $directoryDetailed->name = $directory;
            $directoryDetailed->size = Storage::size($directory);
            $directoryDetailed->extension = "folder";
            $directoryDetailed->path = $directory;
            $directoryDetailed->lastModified = Storage::lastModified($directory);
            array_push($detailedFileData,$directoryDetailed);
        }
        // Fájlok hozzáadása
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

    public static function downloadFile($path){
        return Storage::download($path);
    }

}













