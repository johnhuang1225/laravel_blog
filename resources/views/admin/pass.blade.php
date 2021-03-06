@extends('layouts.admin')

@section('content')
<!--麵包屑導航 開始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 歡迎使用登入網站後台，建站的首選工具。-->
    <i class="fa fa-home"></i> <a href="#">首頁</a> &raquo; 修改密碼
</div>
<!--麵包屑導航 結束-->

<!--結果集標題與導航元件 開始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>修改密碼</h3>
        @if(count($errors)>0)
            <div class="mark">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
        @endif
    </div>
</div>
<!--結果集標題與導航元件 結束-->

<div class="result_wrap">

    <form method="post" action="">
        {{csrf_field()}}

        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>原密碼：</th>
                <td>
                    <input type="password" name="password_o"> </i>請輸入原始密碼</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>新密碼：</th>
                <td>
                    <input type="password" name="password"> </i>新密碼6-20位</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>確認密碼：</th>
                <td>
                    <input type="password" name="password_confirmation"> </i>再次輸入密碼</span>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="送出">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection