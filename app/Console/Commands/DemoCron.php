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
        $userVerifys = UserVerify::where('created_at', '<', Carbon::now()->subMinute(60))->delete();

        $users = User::where('email_verified_at',null)->where('updated_at', '<', Carbon::now()->subMinute(60))->get();
        foreach ($users as $user) {
            \Log::info($user->id);
            if($user->email_verified_at == null){
                $user = User::where('email_verified_at',null)->where('updated_at', '<', Carbon::now()->subMinute(60))->delete();
            }
        }

        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
}