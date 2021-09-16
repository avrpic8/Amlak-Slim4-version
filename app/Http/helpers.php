<?php

function sideBarActive($url, $contain = true){

    if ($contain){
        return (strpos(currentRoute(), $url) === 0) ? 'active' : '';
    }else{
        return currentRoute() === $url ? 'active' : '';
    }
}