<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    protected $fillable = ['user_id', 'parent_id', 'comment', 'status', 'approved', 'post_id'];

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function child(){

        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
}