<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\HotelBooking;
use App\Mail\FeedbackMail;
use Carbon\Carbon;
use Mail;

class GiveFeedBack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:feedback';

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
        // $hotelBookings = HotelBooking::latest()->first();
        
        // $date = date_create($hotelBookings->end_date);
        // date_add($date, date_interval_create_from_date_string("1 day"));
        // $enddate = date_format($date, "Y-m-d");
        //     if($enddate == $currentDate){
        //         Mail::to(auth()->user()->email)->send(new FeedbackMail);
        //     }

        // return 0;
    }
}
