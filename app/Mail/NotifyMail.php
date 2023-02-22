<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use App\Models\ShortCodeMailTemplate;
use App\Models\User;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var string $token
     */
    public $token;

    /**
     * Create a new message instance.
     * @param string $token
     * @return string $this
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
        $pasword_reset = DB::table('password_resets')->where('token', $this->token)->first();
        $pasword_reset_mail = DB::table('password_resets')->where('token', $this->token)->value('email');

        $User = User::where('email', $pasword_reset_mail)->first();
        $emailTemplate = EmailTemplate::where('id', 3)->first();

        $short_code_id = explode(',', $emailTemplate->short_code_id);
        $ShortCodes = ShortCodeMailTemplate::whereIn('id', $short_code_id)->get();

        $shortCode = array();
        foreach ($ShortCodes as $key => $ShortCode) {
            $shortCode[] = $ShortCode->short_code;
        }

        $shortCodeValues = array($User->name, 'Odda');
        $shortCodeValue = array_combine($shortCode, $shortCodeValues);
        $emailContent = strtr($emailTemplate->mail_body, $shortCodeValue);

        return $this->from('jemin.codetrinity@gmail.com')->view('frontend::mail.mail')
            ->subject($emailTemplate->mail_subject)
            ->with(['content' => $emailTemplate->mail_body, 'customer_name' => $User->name,
                'emailContent' => $emailContent]);
    }
}
