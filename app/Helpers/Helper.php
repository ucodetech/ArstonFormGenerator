<?php

namespace App\Helpers;

//update made here

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\StoreSubTransaction;
use App\Models\StoreTransaction;
use App\Models\User;
use Carbon\Carbon;
use DateTime;

function weekOfYear($date) {
    $weekOfYear = intval(date("W", $date));
    if (date('n', $date) == "1" && $weekOfYear > 51) {
        // It's the last week of the previous year.
        return 0;
    }
    else if (date('n', $date) == "12" && $weekOfYear == 1) {
        // It's the first week of the next year.
        return 53;
    }
    else {
        // It's a "normal" week.
        return $weekOfYear;
    }


}
function Test(){
    //test goes here
}
class Helper
{
    public static function IsSuperSuperuser(): bool
    {
        if(auth('superuser')->user()->IsSuperSuperuser === 1){
            return true;
        }
        return false;
    }

    public static function IsSuperuser(): bool
    {
        if(auth('superuser')->user()->permission === 'superuser'){
            return true;
        }
        return false;
    }
    public static function IsEditor(): bool
    {
        if(auth('superuser')->user()->permission === 'editor'){
            return true;
        }
        return false;
    }
 public static function wrap20($string) {
    $wstring = explode("\n", wordwrap($string, 20, "\n") );
    return $wstring[0];
    }
 public static function wrap30($string) {
    $wstring = explode("\n", wordwrap($string, 30, "\n") );
    return $wstring[0];
    }
public static function wrap100($string) {
        $wstring = explode("\n", wordwrap($string, 100, "\n") );
        return $wstring[0];
    }

public static function wrap150($string) {
        $wstring = explode("\n", wordwrap($string, 150, "\n") );
        return $wstring[0];
    }

public static function wrap500($string, $num) {
    $wstring = explode("\n", wordwrap($string, $num, "\n".'...') );
    return $wstring[0];
}

public static function countPost($posts){
    return $posts->where('published', 1)->get();
}
#region DATE FUNCTIONS
    public static function HumanDate($date): string
    {
        return Carbon::createFromDate($date)->diffForHumans();
    }

    public static function timeAgo($time){
        date_default_timezone_set('Africa/Lagos');
        $time = strtotime($time) ? strtotime($time) : $time;
        $timed = time() - $time;

        switch ($timed) {
            case $timed <= 60:
                return 'Just Now!';
                break;
            case $timed >= 60 && $timed < 3600:
                return (round($timed/60) == 1) ? 'a minute ago' : round($timed/60). ' minutes ago';
                break;
            case $timed >= 3600 && $timed < 86400:
                return (round($timed/3600) == 1) ? 'an hour ago' : round($timed/3600). '  hours ago';
                break;
            case $timed >= 86400 && $timed < 604800:
                return (round($timed/86400 ) == 1) ? 'a day ago' : round($timed/86400 ). '  days ago';
                break;

            case $timed >= 604800 && $timed < 2600640:
                return (round($timed/604800 ) == 1) ? 'a week ago' : round($timed/604800 ). '  weeks ago';
                break;
            case $timed >=  2600640 && $timed < 31207680:
                return (round($timed/604800 ) == 1) ? 'a month ago' : round($timed/604800 ). '  months ago';
                break;
            case $timed >= 31207680:
                return (round($timed/31207680 ) == 1) ? 'a year ago' : round($timed/31207680 ). '  years ago';
                break;
        }
    }

    /**
     * @throws \Exception
     */
    public static function endOFMonth($date){
        $date = new DateTime($date);
        $date->modify('last day of this month');
        return $date->format('Y-m-d');
    }

    /**
     * @throws \Exception
     */
    public static function Yestarday($date){
        $date = new DateTime($date);
        $date->modify('yesterday');
        return $date->format('d');
    }

// get last 7 days
    public static function last7days($date){
        if(strtotime($date) < strtotime('-7 days')){
            return $date;
        }
    }

    public static function pretty_days($date): string
    {
        return date('t', strtotime($date));
    }

    public static function pretty_dated($date): string
    {
        return date("F, jS Y", strtotime($date));
    }
    public static function pretty_datess($date): string
    {
        return date("Y-m-d", strtotime($date));
    }

    public static function pretty_date($date): string
    {
        return date("M d, Y h:i A", strtotime($date));
    }
    public static function pretty_dates($dates): string
    {
        return date("M d, Y ", strtotime($dates));
    }
     public static function pretty_time($dates): string
    {
        return date("h:i A ", strtotime($dates));
    }

    public static function  pretty_num($m){
        return date('m', strtotime($m));
    }
    public static function pretty_numD($d){
        return date('d', strtotime($d));
    }
    public static function pretty_year($year)
    {
        return date("Y", strtotime($year));
    }

    public static function pretty_day($day)
    {
        return date("d", strtotime($day));
    }
    public static function pretty_dayLetterd($day)
    {
        return date("D", strtotime($day));
    }
    public static function pretty_monthLetter($month)
    {
        return date("M", strtotime($month));
    }
    public static function pretty_monthNumber($month)
    {
        return date("m", strtotime($month));
    }

    public static function pretty_time1($time){
        return date("h:i");
    }
    public static function pretty_nameDay($day){
        return date('D d  M, Y');
    }
    public static function dateDiffInDays($date1, $date2)
    {
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);

        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return abs(round($diff / 86400));
    }

    public static function sizeFilter($bytes)
    {
        $label = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB' );
        for( $i = 0; $bytes >= 1024 && $i < ( count( $label ) -1 ); $bytes /= 1024, $i++ );
            return( round( $bytes, 2 ) . " " . $label[$i] );
    }

    public static function weekOfMonth($date) {
        //Get the first day of the month.
        $firstOfMonth = strtotime(date("Y-m-01", $date));
        //Apply above formula.
        return weekOfYear($date) - weekOfYear($firstOfMonth) + 1;
    }
#endregion


//money
  public static function Money($money){
        return number_format($money, 2);
    }
//naira money format
    public static function Naira($money){
        return '₦'.number_format($money);
    }
    public static function NairaSign(){
        return '₦';
    }
    //dollar money format
    public static function Dollar($money){
        return '$'.number_format($money, 2);
    }

    //get percentage
    public static function N2P($var){
        return round((int)$var / 100 ) . '%';
    }

 public static function cal_percentage($num) {
    $count1 = $num / 100;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);
    return $count;
}
    //input to string
    public static  function IN2String($str){
        return strval($str);
    }

    public static function removeTag($string){
        return nl2br(html_entity_decode($string));

    }

   public static  function Filter($value){
        return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    }
    public static function removeComma($value){
        return filter_var($value, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_THOUSAND);
    }


  
    public static function ItemPrice($price , $quantity)
    {
        return $price * $quantity;
    }

    public static function aboveHundred($num)
    {
        if ($num >= 100):
            $convert = '99+';
        elseif($num >=1000000):
            $convert = '1M+';
        elseif($num >= 1000000000):
            $convert = '1B+';
        else:
            $convert = $num;
        endif;
        return $convert;
    }

}
