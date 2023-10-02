<?php

namespace App\Listeners;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CustomerQueryMailEvent;
use App\Jobs\CustomerQueryMailJob;
use Log;

class CustomerQueryMailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CustomerQueryMailEvent $event): void
    {
     

        // Handle the request data here (e.g., log it, send notifications, etc.)
        CustomerQueryMailJob::dispatch($event->request);
    }
}
