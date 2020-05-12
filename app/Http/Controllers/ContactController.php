<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Auth;
use App\contactForm;

class ContactController extends Controller
{
    //

    function sendadd(Request $request) {

      $request->validate([
        'subject' => 'required',
        'message' => 'required|min:5',
      ]);

      //Mail::send(new ContactMail($request));

      $contactForm = new contactForm();
      $contactForm->name = Auth::user()->name;
      $contactForm->email = Auth::user()->email;
      $contactForm->subject = $request->input('subject');
      $contactForm->message = $request->input('message');
      $contactForm->save();

      return redirect('contact#contactSection')->withMessage('Thank you for your message. Please allow 48hrs for a reply!');
    }
}
