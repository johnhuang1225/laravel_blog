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
                <h3>快捷操作</h3>
            </div>
            <!--快速導航 開始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批次删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
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
                            <a href="#">修改</a>
                            <a href="#">删除</a>
                        </td>
                    </tr>
                    @endforeach
                    

                </table>


<div class="page_nav">
<div>
<a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一頁</a>
<a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一頁</a>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
<span class="current">8</span>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a> 
<a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一頁</a>
<a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最後一頁</a>
<span class="rows">11 條紀錄</span>
</div>
</div>



                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
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
    </script>

@endsection