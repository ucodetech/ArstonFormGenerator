<?php
function IsSuper(): bool { return \App\Helpers\Helper::IsSuperSuperuser(); }
function IsSuperuser(): bool { return \App\Helpers\Helper::IsSuperuser(); }
function IsEditor(): bool { return \App\Helpers\Helper::IsEditor(); }
function wrap20($word) { return \App\Helpers\Helper::wrap20($word); }
function wrap30($word) { return \App\Helpers\Helper::wrap30($word); }
function wrap100($word) { return \App\Helpers\Helper::wrap100($word); }
function wrap150($word) { return \App\Helpers\Helper::wrap150($word); }
function wrap500($word, $num) { return \App\Helpers\Helper::wrap500($word, $num); }

function aboveHundred($num){ return \App\Helpers\Helper::aboveHundred($num); }



function timeAgo($time){
    return \App\Helpers\Helper::timeAgo($time);
}

function humanDate($date){
    return \App\Helpers\Helper::HumanDate($date);
}

function pretty_dates($date){
    return \App\Helpers\Helper::pretty_dates($date);
}


function pretty_dated($date){
    return \App\Helpers\Helper::pretty_dated($date);
}

function pretty_datess($date){
    return \App\Helpers\Helper::pretty_datess($date);
}

function pretty_year($date){
    return \App\Helpers\Helper::pretty_year($date);
}

function pretty_time($date){
    return \App\Helpers\Helper::pretty_time($date);
}


function sizeFilter($bytes){
    return \App\Helpers\Helper::sizeFilter($bytes);
}


// money
function Money($money){
    return  \App\Helpers\Helper::Money($money);
}

//naira money format
function Naira($money){
    return  \App\Helpers\Helper::Naira($money);
}
function NairaSign(){
    return  \App\Helpers\Helper::NairaSign();
}
//dollar money format
function Dollar($money){
    return  \App\Helpers\Helper::Dollar($money);
}

//get percentage
function N2P($var){
    return  \App\Helpers\Helper::N2P($var);
}

function cal_percentage($num) {
    return  \App\Helpers\Helper::cal_percentage($num);
}
//input to string
function IN2String($str){

    return  \App\Helpers\Helper::IN2String($str);
}

function removeTag($string){
    return  \App\Helpers\Helper::removeTag($string);

}

function Filter($value){
    return  \App\Helpers\Helper::Filter($value);
}
function removeComma($value){
    return  \App\Helpers\Helper::removeComma($value);
}


function ItemPrice($price , $quantity){
    return  \App\Helpers\Helper::ItemPrice($price , $quantity);
}

function kobo($amount){
    return $amount * 100;
}
