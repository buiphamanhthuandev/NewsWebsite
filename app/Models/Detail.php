<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Detail extends Model
{
    use HasFactory;
    protected $table = "details";
    protected $fillable = [
        'id',
        'name',
        'description',
        'created_at',
        'state'
    ]; 
    public function posts(){
        //quan hệ 1,n với post
        return $this->hasMany(Post::class,'detail_id');
    }
}
