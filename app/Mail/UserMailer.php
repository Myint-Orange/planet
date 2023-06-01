<?php

namespace App\Mail;

use App\Models\ContactForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserMailer extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
 
    protected $contactForm;

    public function __construct($contactForm)
    {
        $this->contactForm = $contactForm;
       
    }

    public function build()
    { // dd($this->contactForm->message);
        return $this->view('emails.welcome')
                    ->subject($this->contactForm->topic)
                    ->with([
                        'name' => $this->contactForm->name,
                        'email' =>$this->contactForm->email,
                        'topic' =>$this->contactForm->topic,
                        'contact' =>$this->contactForm->message,
                    ]);
    }
   
    public function content(): Content
    {
        return new Content(
            view: 'user.userMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
