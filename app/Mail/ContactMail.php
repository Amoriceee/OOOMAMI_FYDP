<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Auth;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {

      $this->name = Auth::user()->name;
      $this->email = Auth::user()->email;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->subject('Contact Form Submission Recieved')
                  ->from('p1719222X@my365.dmu.ac.uk', 'OOOMAMI')
                  ->to($this->email)
                  ->markdown('emails.contactTemp');
    }
}
