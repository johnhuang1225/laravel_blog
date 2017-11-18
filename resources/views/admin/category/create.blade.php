@extends('layouts.admin')

@section('content')
    <!--麵包屑導航 開始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 歡迎使用登入網站後台，建站的首選工具。-->
        <i class="fa fa-home"></i> <a href="{{url('/admin/info')}}">首頁</a> &raquo; 添加分類
    </div>
    <!--麵包屑導航 結束-->

	<!--結果集標題與導航元件 開始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快速操作</h3>
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
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批次删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--結果集標題與導航元件 結束-->
    
    <div class="result_wrap">
        <form action="{{url('/admin/category')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>上層分類：</th>
                        <td>
                            <select name="category_pid">
                                <option value=""></option>
                                @foreach($categorys as $category)
                                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>分類名稱：</th>
                        <td>
                            <input type="text" name="category_name">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>標題：</th>
                        <td>
                            <input type="text" class="lg" name="category_title">
                        </td>
                    </tr>
                    <tr>
                        <th>關鍵字：</th>
                        <td>
                            <input type="text" name="category_keywords">
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="category_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>排序</th>
                        <td>
                            <input type="text" name="category_order">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection