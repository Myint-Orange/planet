<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMailer;
use Illuminate\Support\Facades\Auth;

class ContactFormController extends Controller
{

    public function index()
    {
        $contactForms = ContactForm::all();
        return view('admin.contactUs.indexContactForm', compact(['contactForms']));
    }
    public function storeContact(Request $request)
    {
      
        // $data = []; // Your email data
        // $userEmail = 'jnner@example.com';
        // $userName = 'John Doe';
      //  $contactForm=ContactForm::find(1);
        //dd($contactForm);
       
       // dd("Finished to send mail!!!");
        $contactForm = ContactForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'topic' => $request->topic,
            'message' => $request->message,
            'topic_id' => $request->topic_id,
        ]);
        Mail::to($contactForm->email)->send(new UserMailer($contactForm));
      

        return redirect()->route('user.indexContact');
    }
}
