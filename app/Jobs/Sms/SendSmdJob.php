<?php

namespace App\Jobs\Sms;

use App\Services\Sms\Ghasedak\SmsGhasedak;
use App\Services\Sms\Kavenegar\SmsKavenegar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendSmdJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(string $mobile, string $message)
    {
        $this->mobile = $mobile;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::alert('phone : '. $this->mobile .' message : '. $this->message);
        if(config('custom.sms.sms_sender') == 'kavenegar'){
            $service = new SmsKavenegar();
        }else{
            $service = new SmsGhasedak();
        }
        $service->sendMessage($this->message, $this->mobile);
    }
}
