<?php

namespace App\Http\Controllers;

use App\Mail\MailClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index(Request $request){
//        $email = $request->input('email');
//        $commit = $request->input('commit');
//        $arr = [];
//        $targetFile = null;
//        $emailHash = hash('md5', $email);
//        $nameHash = hash('md5', $_FILES['attachments']['name'][0]);
//        if(isset($_FILES['attachments'])){
//            $uploads = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
//            if (!Storage::disk('public')->exists($emailHash)){
//                Storage::makeDirectory('public/'.$emailHash);
//            }
//            $targetFile = $uploads. $emailHash. '/' .basename($_FILES['attachments']['name'][0]);
//            if (file_exists($targetFile)){
//                $arr['status'] = 0;
//                exit(json_encode($arr));
//            } else {
//                move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile);
//                $arr['status'] = 1;
//            }
//        }
//        $data = [
//            'email' => $email,
//            'commit' => $commit,
//            'email_hash' => $emailHash,
//            'file_hash' => $nameHash,
//            'file_name' => $_FILES['attachments']['name'][0],
//        ];
//        DB::table('files')->insert($data);
//
//        Mail::to($email)->send(new MailClass($emailHash, $nameHash));
//        exit(json_encode($arr));
    }
}
