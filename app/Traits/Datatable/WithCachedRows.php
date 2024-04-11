<?php

namespace App\Traits\Datatable;

use Livewire\Livewire;

trait WithCachedRows {
    protected $useCache = false;

    public function useCachedRows(): void
    {
        $this->useCache = true;
       
    }

    public function grabCache($callback){

        $cacheKey = $this->getId();
        if($this->useCache && cache()->has($cacheKey)){
            return cache()->get($cacheKey);
        }
        $result =  $callback();

        cache()->put($cacheKey, $result);
        return $result;

    }
}