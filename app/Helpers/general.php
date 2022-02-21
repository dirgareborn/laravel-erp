<?php

use Illuminate\Support\Carbon;

function format_date($date){
    Carbon::setLocale('id');
    return Carbon::parse($date)->translatedformat('d F Y');
}

function is_img_thumb($url = null){
 if(!$url){
    return asset('img/no-image.jpg');
 }else{
     return asset('storage/products/thumb/'.$url);
 }
}


function is_img($url = null){
 if(!$url){
    return asset('img/no-image.jpg');
 }else{
    return asset('storage/products/'.$url);
 }
}

function is_active($is_active = null){
    if($is_active == 1){
        return 'Aktif';
    }else{
        return 'Tidak Aktif';
    }
}
