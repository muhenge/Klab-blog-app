<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ArticleEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(Auth()->user())
        {
            $user = Auth()->user()->username;
        }
        else{

            $user = "Shobi";
        }
        $subject = "kLab Blog App notification";
        return $this->subject($subject)->view('emails.index', compact('user'));
    }
}
