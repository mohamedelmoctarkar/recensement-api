<?php

namespace Modules\Authentification\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Authentification\Notifications\MailResetPasswordNotification;

class SendLinkJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $token;
    private $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($token, $user)
    {
        Log::info('start sending job send link reset password to mail-----------');
        Log::info($user);
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('-----------start sending job send link reset password to mail');
        $this->user->notify(new MailResetPasswordNotification($this->token));
        Log::info('link-------send-----successfully');
    }
}
