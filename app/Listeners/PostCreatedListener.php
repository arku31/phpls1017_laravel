<?php

namespace App\Listeners;

use App\Posts\PostCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreatedListener implements ShouldQueue
{
//    use Queueable;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $data = $event->posts;
        file_put_contents(public_path().'/1.json', $data);
        sleep(5);
    }
}
