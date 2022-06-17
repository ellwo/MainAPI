<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadeController extends Controller
{
    //
    public function store(Request $request)
    {
        # code...
        if($request->has('data64'))
        {
            $img =$request['data64'];
            $ext='';
            if (strpos($img, 'data:image/jpeg;base64,') === 0) {
                $img = str_replace('data:image/jpeg;base64,', '', $img);
                $ext = '.JPG';
            }
            if (strpos($img, 'data:image/png;base64,') === 0) {
                $img = str_replace('data:image/png;base64,', '', $img);
                $ext = '.png';
            }

            $img = str_replace(' ', '+', $img);
            $folder = uniqid();
            $name=$folder.now()->timestamp.$ext;

            $file=base64_decode($img);

            $foldername='avatars';
            $foldernamegoogle='1BOTbU_WNmknImrYWYPP8evls1Dp40hud/';//'538578267';
            $path=$foldername.'/'.$name;
            $pathtogoogel=$foldernamegoogle.$name;


            try{
                $pathh= Storage::disk('public')->put($path,base64_decode($img));


                $urllll =Storage::disk('public')->url($path);


               // $urllll='storage/'.$pathtogoogel;

            }
            catch(Exception $ex){

                $erro='unnone';
                $message=$ex->getMessage();

                return $data=Array('mess'=>$message,'data64'=>$request['data64']);

            }
            return $data=Array('url'=>$urllll,'error'=>'no');


        }
        else
        {
            return 'noData';
        }


    }


    public function delete(Request $request){



        $urldelete=$request["deleted_url"];
        $urldelete= \Str::replaceFirst(config("app.url")."/storage", '', $urldelete);
        return $dele=Storage::disk("public")->delete($urldelete);


    }

}
