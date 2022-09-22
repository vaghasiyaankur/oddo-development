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

        $subdate =  Carbon::now()->subDay()->format('Y-m-d');
        $hotelBookings = HotelBooking::where('end_date',$subdate)->get();

        foreach ($hotelBookings as $key => $hotelBooking) {
           $userMail = $hotelBooking->hotelBookingUser($hotelBooking->user_id)->email;
           $hotel_id = $hotelBooking->hotel_id;
            Mail::to($userMail)->send(new FeedbackMail());
        }
    }
}
