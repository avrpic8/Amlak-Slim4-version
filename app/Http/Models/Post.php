<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'body', 'image', 'user_id', 'cat_id', 'published_at', 'status'];
    protected $dates = ['deleted_at'];
    public $casts = ['image' => 'string', 'status' => 'boolean'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}