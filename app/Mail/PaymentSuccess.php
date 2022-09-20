<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\EmailTemplate;
use App\Models\ShortCodeMailTemplate;
use App\Models\HotelBooking;
class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $emailTemplate = EmailTemplate::where('id', 5)->first();

        $short_code_id = explode(',',$emailTemplate->short_code_id);
        $ShortCodes = ShortCodeMailTemplate::whereIn('id',$short_code_id)->get();

        $bookingId = HotelBooking::select('UUID')->latest()->first();
        $shortCode = array();
        foreach ($ShortCodes as $key => $ShortCode) {
            $shortCode[] = $ShortCode->short_code;;
        }

        $shortCodeValues = array($User->name, 'Odda', $bookingId->UUID);

        $shortCodeValue = array_combine($shortCode, $shortCodeValues);
        $emailContent = strtr($emailTemplate->mail_body, $shortCodeValue);

        return $this->from('jemin.codetrinity@gmail.com')->view('frontend::payment.PaymentSuccessMail')
                    ->subject($emailTemplate->mail_subject)
                    ->with(['content' => $emailTemplate->mail_body ,'customer_name' =>  $User->name, 'emailContent' => $emailContent]);
    }
}
