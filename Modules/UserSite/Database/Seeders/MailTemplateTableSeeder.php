<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmailTemplate;

class MailTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mailTeamplates = [
            [
                'Verify Email',
                'Verify Your Email Address',
                'demo'
            ],[
                'Registration',
                'Register Your Email Address',
                'demo'
            ],[
                'password Reset',
                'Recover Password of Your Account',
                'demo'
            ],[
                'password reset confirmation',
                'password reset confirmation',
                'demo'
            ],[
                'booking confirmation',
                'Confirmation of hotel booking',
                'demo'
            ],[
                'booking canceled',
                'canceled of hotel booking',
                'demo'
            ],[
                'booking request approve',
                'booking request approve',
                'demo'
            ],
        ];

        foreach ($mailTeamplates as  list($mail_type, $mail_subject, $mail_body)) {
            EmailTemplate::create([
                'mail_type' => $mail_type,
                'mail_subject' => $mail_subject,
                'mail_body' => $mail_body 
            ]);
        }
    }
}
