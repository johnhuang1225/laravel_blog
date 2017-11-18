@extends('layouts.admin')

@section('content')
    <!--麵包屑導航 開始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 歡迎使用登入網站後台，建站的首選工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 全部分類
    </div>
    <!--麵包屑導航 結束-->

	<!--結果頁快速搜尋框 開始-->
	{{--<div class="search_wrap">--}}
        {{--<form action="" method="post">--}}
            {{--<table class="search_tab">--}}
                {{--<tr>--}}
                    {{--<th width="120">選擇分類:</th>--}}
                    {{--<td>--}}
                        {{--<select onchange="javascript:location.href=this.value;">--}}
                            {{--<option value="">全部</option>--}}
                            {{--<option value="http://www.baidu.com">百度</option>--}}
                            {{--<option value="http://www.sina.com">新浪</option>--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<th width="70">關鍵字:</th>--}}
                    {{--<td><input type="text" name="keywords" placeholder="關鍵字"></td>--}}
                    {{--<td><input type="submit" name="sub" value="查詢"></td>--}}
                {{--</tr>--}}
            {{--</table>--}}
        {{--</form>--}}
    {{--</div>--}}
    <!--結果頁快速搜尋框 結束-->

    <!--搜尋結果頁面 列表 開始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>分類管理</h3>
            </div>
            <!--快速導航 開始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('/admin/category/create')}}"><i class="fa fa-plus"></i>增加分類</a>
                    <a href="{{url('/admin/category')}}"><i class="fa fa-recycle"></i>全部分類</a>
                </div>
            </div>
            <!--快速導航 結束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        {{--<th class="tc" width="5%"><input type="checkbox" name=""></th>--}}
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>分類名稱</th>
                        <th>標題</th>
                        <th>查看次數</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $v)
                    <tr>
                        {{--<td class="tc"><input type="checkbox" name="id[]" value="59"></td>--}}
                        <td class="tc">
                            <input type="text" name="ord[]"
                                   value="{{$v->category_order}}"
                                   onchange="changeOrder(this, {{$v->category_id}});">
                        </td>
                        <td class="tc">{{$v->category_id}}</td>
                        <td>
                            <a href="#">{{$v->_category_name}}</a>
                        </td>
                        <td>{{$v->category_title}}</td>
                        <td>{{$v->category_views}}</td>
                        <td>
                            <a href="{{url('/admin/category/'.$v->category_id.'/edit')}}">修改</a>
                            <a href="javascript:void(0);" onclick="deleteConfirm({{$v->category_id}});">删除</a>
                        </td>
                    </tr>
                    @endforeach
                    

                </table>

            </div>
        </div>
    </form>
    <!--搜尋結果頁面 列表 結束-->

    <script>
        function changeOrder(obj, category_id) {
            var new_order = $(obj).val();
            $.post('{{url('admin/category/changeOrder')}}',
                    {
                        '_token': '{{csrf_token()}}',
                        'category_id': category_id,
                        'new_order': new_order,
                    },
                    function(data) {
                        if (data.status == 0) { // 更新成功
                            layer.alert(data.msg, {icon: 6});
                        } else { // 更新失敗
                            layer.alert(data.msg, {icon: 5});
                        }
                    }
            );
        }

        function deleteConfirm($id) {
            layer.confirm('確定刪除這個分類嗎？', {
                btn: ['確定','取消'] //按钮
            }, function(){
                $.post("{{url('/admin/category')}}/" + $id,
                        {"_token":"{{csrf_token()}}", "_method": "delete"},
                        function(data){
                            if (data.status==0) {
                                location.href = location.href;
                                layer.msg(data.msg, {icon: 6});
                            } else {
                                layer.msg(data.msg, {icon: 5});
                            }
                        }
                );
            }, function(){

            });
        }
    </script>

@endsection