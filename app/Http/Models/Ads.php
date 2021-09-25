<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'address', 'amount', 'image', 'floor', 'year', 'storeroom', 'balcony', 'area'
        , 'room', 'toilet', 'parking', 'tag', 'status', 'user_id', 'cat_id', 'sell_status', 'type', 'view'];
    protected $dates = ['deleted_at'];

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(){

        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function gallery(){

        return $this->hasMany(Gallery::class, 'advertise_id', 'id');
    }
}