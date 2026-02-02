<?php

namespace App\Jobs;

use App\Mail\verifyMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class MailJob implements ShouldQueue
{
    use Queueable;
        protected $user;
    /**
     * Create a new job instance.
     */
    public function __construct( $user)
    {
        $this->user=$user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // echo "ads";
        // dd($user);

       Mail::to($this->user->email)->send(new verifyMail($this->user));
        
    }
}
