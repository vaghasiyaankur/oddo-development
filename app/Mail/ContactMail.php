<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var array<SomeConstants::*, mixed>
     */
    public $data;

    /**
     * Create a new message instance.
     * @param mixed $data
     * @return array<SomeConstants::*, mixed>
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        return $this->from($request->email)->view('frontend::mail.Contact')
            ->subject('Contact')->with(['data' => $this->data]);
    }
}
