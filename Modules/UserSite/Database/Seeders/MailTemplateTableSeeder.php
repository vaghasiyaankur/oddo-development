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
                'demo',
                '1'
            ],[
                'Registration',
                'Register Your Email Address',
                'demo',
                '1,2'
            ],[
                'password Reset',
                'Recover Password of Your Account',
                'demo',
                '1,2'
            ],[
                'password reset confirmation',
                'password reset confirmation',
                'demo',
                '1,2'
            ],[
                'booking confirmation',
                'Confirmation of hotel booking',
                'demo',
                '1,2'
            ],[
                'booking canceled',
                'canceled of hotel booking',
                'demo',
                '1,2'
            ],[
                'booking request approve',
                'booking request approve',
                'demo',
                '1,2'
            ],
        ];

        foreach ($mailTeamplates as  list($mail_type, $mail_subject, $mail_body, $short_code)) {
            EmailTemplate::create([
                'mail_type' => $mail_type,
                'mail_subject' => $mail_subject,
                'mail_body' => $mail_body,
                'short_code_id' => $short_code
            ]);
        }
    }
}
