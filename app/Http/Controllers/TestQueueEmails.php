<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestQueueEmails extends Controller
{
    public function sendTestEmails()
    {
        $emailJobs = new TestSendEmail();
        $this->dispatch($emailJobs);
    }
}
