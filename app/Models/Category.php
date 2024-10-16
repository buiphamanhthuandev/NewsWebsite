<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'created_at',
        'state'
    ]; 
    public function posts(){
        //quan hệ 1,n với post
        return $this->hasMany(Post::class,'category_id');
    }
}
