<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\BlogUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once(__DIR__ . '/../../../../resources/org/code/Code.class.php');

class LoginController extends CommonController
{
    public function login()
    {
        if ($input = Input::all()) {
            $code = new \Code();
            $_code = $code->get();
            if (strtoupper($input['code']) != $_code) {
                return back()->with('msg', '驗證碼錯誤');
            }

            $user = BlogUser::first();
            if ($user->username != $input['username'] || Crypt::decrypt($user->password) != $input['password']) {
                return back()->with('msg', '帳號密碼錯誤');
            }

            session(['user' => $user]);
            return redirect('admin/index');
        } else {
//            dd($_SERVER);
            return view('admin/login');
        }
    }

    public function quit()
    {
        session(['user' => null]);
        return redirect('admin/login');
    }


    public function code()
    {
        $code = new \Code();
        $code->make();
    }

    public function crypt()
    {
        $str = "123456";
        $str_p = "eyJpdiI6IkI4OVNwYmNqdXZqVDZQZlwvUkZCajRRPT0iLCJ2YWx1ZSI6Ilh2NXVyQTRkcm1IYUpxc1wvWEN6QjdnPT0iLCJtYWMiOiIxYmZhMTgwZmRiZTQ3OGYyMjYzNjRiNTQxOTIzYjBhNmI0MTA0YTNjNWM3Nzc3YjhjMjA0NWJmY2IwMmI1NmZmIn0=";
        $str_pp = "eyJpdiI6IjJUc0NEc0ZmeHhYcFpJaDB0d0o4SGc9PSIsInZhbHVlIjoidTNDOGpuYVd3XC9aV1BjaDMrZlZaOXc9PSIsIm1hYyI6Ijc3NTRjNDAzMDRlYjliZjI4ZDgzZjZhNzI3NWNjNjdkODk3N2M4YjBkYmEyYzQ5ZGU0YmY3Y2NjZGM1ZWYwNGIifQ==";
        echo Crypt::encrypt($str);
        echo '<br>';
        echo Crypt::encrypt($str);
        echo '<br>';
        echo Crypt::decrypt($str_p);
        echo '<br>';
        echo Crypt::decrypt($str_pp);
    }

//    public function getcode()
//    {
//        $code = new \Code();
//        echo $code->get();
//    }
}
