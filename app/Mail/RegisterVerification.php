<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use App\Models\ShortCodeMailTemplate;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterVerification extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var mixed
     */
    public $token;
    
    /**
     * @var mixed
     */
    protected $User;
    
    /**
     * Create a new message instance.
     * @param mixed $token
     * @return mixed $this
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $User = User::latest()->first();
        $emailTemplate = EmailTemplate::where('id', 2)->first();

        $short_code_id = explode(',', $emailTemplate->short_code_id);
        $ShortCodes = ShortCodeMailTemplate::whereIn('id', $short_code_id)->get();

        $shortCode = array();
        foreach ($ShortCodes as $key => $ShortCode) {
            $shortCode[] = $ShortCode->short_code;
        }

        $shortCodeValues = array($User->name, 'Odda');
        $shortCodeValue = array_combine($shortCode, $shortCodeValues);
        $emailContent = strtr($emailTemplate->mail_body, $shortCodeValue);

        return $this->from('jemin.codetrinity@gmail.com')->view('frontend::mail.RegisterVerificationMail')
            ->subject($emailTemplate->mail_subject)
            ->with(['content' => $emailTemplate->mail_body, 'customer_name' => $User->name,
                'emailContent' => $emailContent]);
    }
}
