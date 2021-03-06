<?php


namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'url', 'amount', 'address', 'body', 'image'];
    protected $dates = ['deleted_at'];
}