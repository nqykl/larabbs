<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //创建完数据模型后，都需要设置 Category 的 $fillable 属性
    protected $fillable = [
        'name', 'description',
    ];
}
