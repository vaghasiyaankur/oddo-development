<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\EmailTemplate;

class RegisterVerification extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    protected $User;
    /**
     * Create a new message instance.
     *
     * @return void
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

        $dataValue = array(
            'customer_name'  => $User->name,
            'website_title' => 'Odda'
        );
        
        $pattern = '{%s}';
        foreach($dataValue as $key=>$val){
            $varMap[sprintf($pattern,$key)] = $val;
        }

        $emailContent = strtr($emailTemplate->mail_body,$varMap);
        
        return $this->from('jemin.codetrinity@gmail.com')->view('frontend::auth.RegisterVerificationMail')
                    ->subject($emailTemplate->mail_subject)
                    ->with(['content' => $emailTemplate->mail_body ,'customer_name' =>  $User->name, 'emailContent' => $emailContent]);
    }
}
