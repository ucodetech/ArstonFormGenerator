<?php

namespace App\Traits;
use App\Events\SuperuserLog;
use Jenssegers\Agent\Facades\Agent;
trait WithSuperuserLog
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
    public $page;
    public $languages = [];
    public $superuser;
    public $device;
    public $action;



    public function user_logs($activity, $realPage): void
    {
        $this->activity($activity, $realPage);
    }
    protected function activity($activity, $realPage): void
    {

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
        $this->page = $realPage;
        $this->languages = Agent::languages();
        $this->superuser = auth('superuser')->user()->id;
        $this->action = $activity;

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

//        '$device, $browser, $browserVersion, $os, $os_version, $robot, $robotName, $ip, $mac, $page, $languages, $superuser, $activity'
        event(new SuperuserLog(
            $this->device,
            $this->browser,
            $this->browserVersion,
            $this->os,
            $this->os_version,
            $this->robot,
            $robotName,
            $this->ip,
            $this->mac,
            $this->page,
//            $this->languages,
            $this->superuser,
            $this->action
        ));

    }




}
