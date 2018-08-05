<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class TestController extends Controller
{
    public function index(){
        echo asset('uploads1');
    }
    public function test(){
        $arrayUrl = explode('/', $_SERVER['REQUEST_URI']);
        $emailHash = $arrayUrl[2];
        $fileHash = $arrayUrl[3];
        $file = DB::table('files')
            ->where([
                ['email_hash', $emailHash],
                ['file_hash', $fileHash]
            ])
            ->first();
//        dd($file);
        $url = Storage::url('public/'.$emailHash.'/'.$file->file_name);
        redirect($url);
    }
}
