<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'content',
        'image',
        'author',
        'created_at',
        'detail_id'
    ];
    public function detail(){
        //thiết lập quan hệ khóa ngoại với detail !
        return $this->belongsTo(Detail::class,'detail_id');
    }
}
