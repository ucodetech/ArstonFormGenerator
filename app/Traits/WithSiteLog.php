<?php

namespace App\Traits;

use App\Events\SuperuserLog;
use App\Models\SiteData;
use App\Models\Visitor;
use Carbon\Carbon;
use Jenssegers\Agent\Facades\Agent;

trait WithSiteLog
{
    public $desktop;
    public $mobile;
    public $tablet;
    public $browser;
    public $browserVersion;
    public $os;
    public $os_version;
    public $robot;
    public $robotName;
    public $ip;
    public $mac;
    public $device;
    public $date;
    public function initializeWithSiteLog(): void
    {
        $this->date = date('Y-m-d');
        $this->browser = Agent::browser();
        $this->desktop =  Agent::isDesktop();
        $this->mobile = Agent::isMobile();
        $this->tablet = Agent::isTablet();
        $this->browser = Agent::browser();
        $this->browserVersion = Agent::version($this->browser);
        $this->os = Agent::platform();
        $this->os_version = Agent::version($this->os);
        $this->robot = Agent::isRobot();
        $this->robotName = Agent::robot();
        $this->ip = request()->ip();
        $this->mac = "fakeMac";
    }


    public function grabData(): void
    {
         $this->store();
         $this->siteVisitor();
    }

    public function getCollectedDataTodayProperty(){

        return SiteData::where(['ip'=> $this->ip, 'created_at'=> $this->date])->get();
    }

    public function getVisitedTodayProperty(){
        return Visitor::where(['ip_address'=> $this->ip, 'created_at'=>$this->date])->get();
    }
    protected function store(): void
    {

        if($this->desktop){
            $this->device = 'Desktop/Laptop';
        }elseif($this->mobile){
            $this->device = Agent::device();
        }elseif ($this->tablet) {
            $this->device = "Tablet Phone";
        }
        if($this->robot) {
            $robotName =  $this->robotName;
        }else{
            $robotName = "Not robot";
        }
       if(count($this->collected_data_today) < 1):
            SiteData::create([
                'device' => $this->device,
                'ip' => $this->ip,
                'mac' => $this->mac,
                'browser' => $this->browser,
                'browser_version' => $this->browserVersion,
                'os' => $this->os,
                'os_version' => $this->os_version,
                'isRobot' => $this->robot,
                'robot_name' => $robotName,
                'created_at' => Carbon::now()
            ]);
       endif;
    }

    protected function siteVisitor(): void
    {
        if(count($this->visited_today) < 1):
            Visitor::create([
                'ip_address' => $this->ip,
                'created_at' => Carbon::now()
            ]);
        endif;
    }

}
