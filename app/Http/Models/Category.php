<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model{

    use SoftDeletes;
    protected $fillable = ['name', 'parent_id'];
    protected $dates = ['deleted_at'];

    public function parent(){

        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}