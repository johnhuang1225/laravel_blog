<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller
{
    public function upload(Request $request)
    {
//        var_dump($_FILES);
//        exit();

        if ($request->isMethod('POST'))
        {
            $file = $request->file('myfile');
            // 文件是否上傳成功
            if ($file->isValid())
            {
                $originalName = $file->getClientOriginalName(); // 原文件名
                $ext = $file->getClientOriginalExtension(); // 附檔名
                $type = $file->getMimeType();
                $realPath = $file->getRealPath(); // 臨時文件絕對路徑

                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                if ($bool) {
                    return response()->json(['result' => 1, 'filename' => $filename]);
                } else {
                    return response()->json(['result' => 0, 'filename' => 'N/A']);
                }

            }
        }


        // class 36 中使用的 uploadify 外掛，但使用上有問題。改為上面自行撰寫
        /*
        $file = Input::file('Filedata');
        if ($file->isValid())
        {
//            $realPath = $file->getRealPath(); // 臨時文件的絕對路徑
            $extension = $file->getClientOriginalExtension(); // 文件附檔名
            $newName = date('YmdHis').mt_rand(100, 999).'.'.$extension;
            $path = $file->move(base_path.'/uploads', $newName);
            $filePath = 'uploads/'.$newName;
            return  response()->json(['result' => 1, 'filename' => $newName]);
        }
        return response()->json(['result' => 0, 'filename' => 'N/A']);
        */
    }
}
