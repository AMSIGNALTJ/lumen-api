<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // 批量赋值许可
    protected $fillable = ['id', 'name'];

    // 关闭时间戳
    public $timestamps = false;
}
