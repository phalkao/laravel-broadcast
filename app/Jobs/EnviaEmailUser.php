<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EnviaEmailUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $users;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->users = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = "teste";

        Mail::send('emails1', ['dados' => $this->users], function ($message){
            $message->from('phalkao@gmail.com', 'Sistema - Broadcast');
            $message->to('phalkao@gmail.com', 'julio');
            $message->subject('Enviando e-mail de teste.');
        });

        return $message;
    }

    public function failed(Throwable $exception)
    {
        dd($exception);
    }
}
