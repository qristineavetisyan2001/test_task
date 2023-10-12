<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewStoryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $storyTitle;
    public $storyDescription;
    public $approvalLink;
    private mixed $story;

    /**
     * Create a new message instance.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->story = $data['story'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Story Notification')
            ->view('emails.new_story_notification',['story'=>$this->story]);
    }
}
