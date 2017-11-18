<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categorys = Category::all();
//        $data = $this->getTree($categorys);
//        return view('admin.category.index')->with('data', $data);

        $data = (new Category)->tree();
        return view('admin.category.index')->with('data', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::where('category_pid', 0)->get();
        return view('admin.category.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::except('_token');
        $rules = [
            'category_pid' => 'required',
            'category_name' => 'required',
        ];

        $messages = [
            'category_pid.required' => '上層分類必選',
            'category_name.required' => '分類名稱必填',
         ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->passes()) {
            $result = Category::create($input);
            if ($result) {
                return redirect('admin/category');
            } else {
                return back()->with('errors', '資料寫入錯誤');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = Category::where('category_pid', 0)->get();
        $category = Category::find($id);
        return view('admin.category.edit', [
            'categorys' => $categorys,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = Input::except('_token', '_method');

        $rules = [
            'category_pid' => 'required',
            'category_name' => 'required',
            'category_title' => 'required',
        ];

        $messages = [
            'category_pid.required' => '上層分類必選',
            'category_name.required' => '分類名稱必填',
            'category_title.required' => '分類標題必填',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->passes()) {
            $result = Category::where('category_id', $id)->update($input);
            if ($result) {
                return redirect('admin/category');
            } else {
                return back()->with('errors', '資料更新錯誤');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function changeOrder()
    {
        $input = Input::all();
        $category = Category::find($input['category_id']);
        $category->category_order = $input['new_order'];
        $result = $category->update();
        if ($result) {
            $data = [
                'status' => 0,
                'msg' => '分類排序更新成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '分類排序更新失敗，請稍後重試',
            ];
        }
        return $data;
    }
}
