<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
class UpdateLoginStatus
{
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->last_login_at = $event->user->current_login_at ? $event->user->current_login_at : Carbon::now('asia/kolkata');
        $event->user->current_login_at = Carbon::now('asia/kolkata');
        $event->user->save();
    }
}
