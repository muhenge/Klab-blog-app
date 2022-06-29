<?php

namespace App\Listeners\Illuminate\Auth\Listeners;

use App\Events\Illuminate\Auth\Events\ArticleCreated as EventsArticleCreated;
use App\Mail\MyMail;
use Illuminate\Auth\Events\ArticleCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailAfterCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\ArticleCreated  $event
     * @return void
     */
    public function handle(EventsArticleCreated $event)
    {
        $email=$event->email;
         //Mail::to(auth()->user()->email)->send(new MyMail());
      return  Mail::to($email)->send(new MyMail());
    }
}
