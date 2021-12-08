<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getCreatedBeforeAttribute(){
        $ts = time() - strtotime($this->created_at);
        if ($ts < 60){
            return "$ts giây trước";
        }
        if ($ts >= 60 && $ts < 3600){
            return date("i", $ts)." giây trước";
        }
        if ($ts >= 3600 && $ts < 86400){
            return date("H", $ts)." giờ trước";
        }
        if ($ts >= 86400 && $ts < 2592000){
            return date("d", $ts)." ngày trước";
        }
        if ($ts >= 2592000 && $ts < 31104000){
            return date("m", $ts)." tháng trước";
        }
        if ($ts >= 31104000){
            return floor($ts / 31104000)." năm trước";
        }
    }
}
