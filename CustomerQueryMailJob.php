<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\CustomerQueryMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Log;

class CustomerQueryMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $request=[];
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Mail::to($this->request['email'])->later(now()->addMinutes(1), new (CustomerQueryMail($this->request)));
        Mail::to($this->request['email'])->send(new CustomerQueryMail($this->request));
    }
}
