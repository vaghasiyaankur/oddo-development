<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\HotelBooking;
use App\Mail\FeedbackMail;
use App\Models\User;
use Carbon\Carbon;
use Mail;
use Log;

class GiveFeedBack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'give:feedback';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';



    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        // $currentDate = Carbon::now()->format('Y-m-d');
        // $hotelBookings = HotelBooking::get();
        // $userMail = $hotelBookings->user->email;
        
        // $date = date_create($hotelBookings->end_date);
        // date_add($date, date_interval_create_from_date_string("1 day"));
        // $enddate = date_format($date, "Y-m-d");
        //     if($enddate == $currentDate){
        //         Mail::to($userMail)->send(new FeedbackMail);
        //     }

                  
        $subdate =  Carbon::now()->subDay()->format('Y-m-d');
        $hotelBookings = HotelBooking::where('end_date',$subdate)->get(); 
        
        foreach ($hotelBookings as $key => $hotelBooking) {
           $userMail = $hotelBooking->hotelBookingUser($hotelBooking->user_id)->email;
            Mail::to($userMail)->send(new FeedbackMail);
        }
    }
}
