<?php

namespace App\Http\Controllers;


use App\Http\Models\Ads;
use App\Http\Models\Post;
use App\Http\Models\User;

class MainController{

    protected $sumArea;
    protected $usersCount;
    protected $postsCount;
    protected $adsCount;

    public function __construct(){

        $ads = Ads::all();
        $this->sumArea = 0;
        foreach ($ads as $advertise)
        {
            $this->sumArea += (int) $advertise->area;
        }
        $this->usersCount = count(User::all());
        $this->postsCount = count(Post::all());
        $this->adsCount = count($ads);
    }
}