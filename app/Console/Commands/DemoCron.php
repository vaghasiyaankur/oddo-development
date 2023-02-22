<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Console\Command;

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
        $time = Carbon::now()->subMinutes(60);
        $userVerifys = UserVerify::where('created_at', '<', $time)->delete();

        $users = User::where('email_verified_at', null)
            ->where('updated_at', '<', $time)->get();

        foreach ($users as $user) {
            if ($user->email_verified_at == null) {
                $user = User::where('email_verified_at', null)
                    ->where('updated_at', '<', $time)->delete();
            }
        }
    }
}
