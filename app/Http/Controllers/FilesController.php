<?php

namespace App\Http\Controllers;
use Input;
use Image;
use Uuid;
use Illuminate\Auth\Access\Response;
use App\Models\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadfile()
    {
        /** 1: video : 1 files
         *  2: thumbnail 1 files
         *  3: documents : mutil files allowed
         *
         */

        $files = Input::file('files');
        $thumbail_extension = ['.png','.gif','.jpe','.jpg'];
        if ($files) {
            $fileObject = new File();
            $upload_folder = '/uploads/';
            $destinationPath = public_path() . $upload_folder;
            $results = [];

            // for documents, mutil files
            if(is_array($files) == true){
                foreach($files as $file){
                    $extenstion = substr($file->getClientOriginalName(),-4);
                    $filename = (Uuid::generate(1) . $extenstion);
                    $fileObject->name_url = $filename;
                    // copy to server
                    $upload_success = $file->move($destinationPath, $filename);
                    $result = new \stdClass();
                    $result->url= $filename;
                    array_push($results,$result);
                    if ($upload_success) {
                        $fileObject->type = 3;
                        $fileObject->public = 0;
                        $fileObject->save();
                    } else {
                        return Response::json('error', 400);
                    }
                }
            }
            // for video and thumbnail only one file one time
            else{
                $extenstion = substr($files->getClientOriginalName(),-4);
                $filename = (Uuid::generate(1) . $extenstion);
                $fileObject->name_url = $filename;
                // copy to server
                $upload_success = $files->move($destinationPath, $filename);
                if ($upload_success) {
                    // resize image
                    if (in_array($extenstion, $thumbail_extension)) {
                        Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);
                        $fileObject->type = 2;
                    }else{
                        $fileObject->type = 1;
                    }
                    $fileObject->public = 0;
                    $fileObject->save();
                } else {
                    return Response::json('error', 400);
                }
                $result = new \stdClass();
                $result->url= $filename;
                array_push($results,$result);
            }
            return response()->json([
                'files' => $results
            ]);

        }else{
            return response()->json([
                'status' => 'fails',
                'value' => '400'
            ]);
        }
    }
}
