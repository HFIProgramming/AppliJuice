<?php

namespace App\Listeners;

use App\College;
use App\EssayTag;
use App\Events\newCollege;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class createCollegeAndTag
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
     * @param  newCollege  $event
     * @return void
     */
    public function handle(newCollege $event)
    {
        //
        $collegeName = $event->collegeName;
        College::create(['name' => $collegeName]);
        EssayTag::create(['tag' => $collegeName, 'type' => 'school']);
    }
}
