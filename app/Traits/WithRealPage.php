<?php

namespace App\Traits;

trait WithRealPage
{
    public $realPage;

    public function grabPage(){
       return basename($_SERVER['PHP_SELF'] . '.blade.php');
    }
}