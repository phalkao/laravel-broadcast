<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail as FacadeMail;
use App\Mail\newBroadcastMail as MailNewBroadcastMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \stdClass;

class newBroadcastMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(stdClass $user) 
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        FacadeMail::send(new MailNewBroadcastMail($this->user));
    }
}
