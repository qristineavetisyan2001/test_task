<?php

namespace App\Console\Commands;


use App\Jobs\SendNewStoryNotificationEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewStoryNotification;

class SendNewStoryNotification extends Command
{
    protected $signature = 'email:send-new-story-notification {story}';
    protected $description = 'Send a new story notification email to the admin';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $mailData = $this->arguments('story');

        dispatch(new SendNewStoryNotificationEmail($mailData));

        $this->info('New story notification email job dispatched.');
    }
}
