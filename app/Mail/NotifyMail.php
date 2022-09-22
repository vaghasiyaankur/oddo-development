<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\EmailTemplate;
use App\Models\ShortCodeMailTemplate;
 
class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
 
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
        $userId = auth()->user()->id;
        $User = User::whereId($userId)->first();
        $emailTemplate = EmailTemplate::where('id', 3)->first();

        $short_code_id = explode(',',$emailTemplate->short_code_id);
        $ShortCodes = ShortCodeMailTemplate::whereIn('id',$short_code_id)->get();

        $shortCode = array();
        foreach ($ShortCodes as $key => $ShortCode) {
            $shortCode[] = $ShortCode->short_code;;
        }

        $shortCodeValues = array($User->name, 'Odda'); 
        $shortCodeValue = array_combine($shortCode, $shortCodeValues);
        $emailContent = strtr($emailTemplate->mail_body, $shortCodeValue);

        return $this->from('jemin.codetrinity@gmail.com')->view('frontend::mail.mail')
                ->subject($emailTemplate->mail_subject)
                ->with(['content' => $emailTemplate->mail_body ,'customer_name' =>  $User->name, 'emailContent' => $emailContent]);;
    }
}