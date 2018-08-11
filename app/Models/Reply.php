<?php

namespace App\Models;

class Reply extends Model
{
    //只允许修改content字段
    protected $fillable = ['content'];

    //一条回复属于一个话题
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    //一条回复属于一个用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
