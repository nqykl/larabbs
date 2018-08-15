<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2018/8/15
 * Time: 23:54
 */
namespace App\Observers;

use App\Models\Link;
use Cache;

class LinkObserver
{
    // 在保存时清空 cache_key 对应的缓存
    public function saved(Link $link)
    {
        Cache::forget($link->cache_key);
    }
}