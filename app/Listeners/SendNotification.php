<?php

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNotification
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $contact_message = $event->message ;
        Mail::send('email.contact-message-notification' , ['contact_message' => $contact_message , function($m) use($contact_message){
            $m->from('ahmedroshdi2014@gmail.com' , 'ahmed roshdy');
            $m->to('admin@roshdy.com' , 'new project');
            $m->subject('New Contact message from : '.$contact_message->email);
        }]);
    }
}
