<?php 

namespace App\Console\Commands;
   
use Illuminate\Console\Command;
use App\Models\UserVerify;
use App\Models\User;
use Carbon\carbon;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");
        
        $userVerifys = UserVerify::where('created_at', '<', Carbon::now()->subHours(1))->get();
        \Log::info($userVerify->toarray());

        foreach ($userVerifys as $userVerify) {
            $user = User::where('id', $userVerify->user_id)->delete();
            $userVerify->delete();
        }

        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
}