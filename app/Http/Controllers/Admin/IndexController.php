<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\BlogUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;



class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    public function resetPassword()
    {
        if ($input = Input::all())
        {
            $rules = [
                'password' => 'required|between:6,20|confirmed',
            ];

            $messages = [
                'password.required' => '新密碼必填',
                'password.between' => '新密碼必須介於6到20位',
                'password.confirmed' => '確認密碼不符合'
            ];

            $validator = Validator::make($input, $rules, $messages);
            if ($validator->passes()) {
                $user = BlogUser::first();
                $_password = Crypt::decrypt($user->password);
                if ($input['password_o'] == $_password) {
                    $user->password = Crypt::encrypt($input['password']);
                    $user->update();
                    return redirect('admin/info');
                } else {
                    return back()->with('errors', '原密碼錯誤');
                }
            } else {
                return back()->withErrors($validator);
            }
        } else {
            return view('admin.pass');
        }
    }
}
