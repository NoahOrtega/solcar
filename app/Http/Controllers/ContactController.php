<?php
namespace App\Http\Controllers;

use App\Notifications\ContactFormMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\Recipient;

class ContactController extends Controller
{
    public function show()
    {
        return view('mail-form.form');
    }
    public function mailContactForm(ContactFormRequest $message, Recipient $recipient)
    {

        if($message->SSN == null) { //honeypot for catching bots
            $recipient->notify(new ContactFormMessage($message));
        }

        return redirect()->back()->with('success', 'Thank you for your message!
        We will get back to you as soon as possible.');
    }
}
