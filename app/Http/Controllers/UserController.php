<?php

namespace App\Http\Controllers;

use App\Models\Api\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;


class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->create(User::get(), 'success', 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getData = $request->all();

        $validator = Validator::make($getData, [
            'id'    =>  'required|min:1|max:10',
            'name'  =>  'required|min:2|max:7'
        ]);

        if ($validator->fails()) {
            return $this->create([], '提交的数据不符合规范', 400);
        } else {
            //            判断一下添加的数据是不是已经存在
            // 写入数据
            $addData = User::create($getData);
            if ($addData) {
                return $this->create($addData, '数据添加成功', 200);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data =  User::find($id);

        if (!is_numeric($id)) {
            return $this->create([], 'id 参数错误, 应该为数字', 204);
        }

        if (empty($data)) {
            return $this->create([], '无数据', 204);
        } else {
            return $this->create($data, '数据请求成功', 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!is_numeric($id)) {
            return $this->create([], 'id 参数错误, 应该为数字', 400);
        }

        $users = User::find($id);

        if (empty($users)) {
            return $this->create([], '要删除的数据不存在', 400);
        }

        if ($users->delete()) {
            return $this->create([], '数据删除成功', 200);
        }
    }
}
