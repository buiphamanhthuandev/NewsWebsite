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
        'views',
        'created_at',
        'category_id'
    ];
    public function category(){
        //thiết lập quan hệ khóa ngoại với category !
        return $this->belongsTo(Category::class,'category_id');
    }
    public function comment(){
        return $this->hasMany(Comment::class,'post_id');
    }
}
