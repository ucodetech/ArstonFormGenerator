<?php
namespace App\Traits;

use App\Events\RegisteredSuperuser;
use App\Events\SendVerificationCode;
use App\Listeners\NewEmailVerification;
use App\Models\VerificationCode;
use App\Models\VerifySuperuserEmail;
use Carbon\Carbon;
use Illuminate\Support\Str;

trait WithSendEmailVerification {

    protected function storeLink($superuser, $token): void
    {
        VerifySuperuserEmail::where('super_id', $superuser)->delete();

        VerifySuperuserEmail::create([
            'token' => $token,
            'super_id' => $superuser,
            'expiry_time' => Carbon::now()->addMinutes(30)
        ]);
    }
    public function storeVerificationLink($superuser, $token): void
    {
        $this->storeLink($superuser, $token);
    }

    public function storeVerificationCode($superuser, $code):void
    {
        $this->storeCode($superuser, $code);
    }
    protected function storeCode($superuser, $code) :void {
        VerificationCode::where('super_id', $superuser)->delete();
        VerificationCode::create([
            'code' => $code,
            'super_id' => $superuser
        ]);
    }

    public function fireEvent($superuser,$message,$token):void
    {
        $this->fireEvents($superuser,$message,$token);
    }
    protected function fireEvents($superuser,$message,$token):void
    {
        $link = url('/superuser/verify-email/'.$superuser->id.'/'.$token
        );
        event(new RegisteredSuperuser($superuser, $message, $link));
    }
    public function fireCodeEvent($superuser,$message,$code):void
    {
        $this->fireCodeEvents($superuser,$message,$code);
    }
    protected function fireCodeEvents($superuser,$message,$code):void
    {
        event(new SendVerificationCode($superuser, $message, $code));
    }
}
