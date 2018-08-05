<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class DownloadController extends Controller
{
    public function index(){
        $arrayUrl = explode('/', $_SERVER['REQUEST_URI']);
        $emailHash = $arrayUrl[2];
        $fileHash = $arrayUrl[3];
        $file = DB::table('files')
            ->where([
                ['email_hash', $emailHash],
                ['file_hash', $fileHash]
            ])
            ->first();
        $public = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        $targetFile = $public . $emailHash. '/' .$file->file_name;
        if (file_exists($targetFile)) {
            if (ob_get_level()) {
                ob_end_clean();
            }
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($targetFile));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($targetFile));
            // читаем файл и отправляем его пользователю
            readfile($targetFile);
            exit;
        }
    }
}
