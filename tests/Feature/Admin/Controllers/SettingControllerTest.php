<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\EmailSetting;
use App\Models\EmailTemplate;
use App\Models\GeneralSetting;
use App\Models\LogoFavicon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SettingControllerTest extends TestCase
{
    use RefreshDatabase;

    private $GeneralSetting;

    protected function setUp(): void
    {
        parent::setUp();
        $this->GeneralSetting = GeneralSetting::first();
        $this->adminLogin();
    }

    /**
     * @return void
     */
    public function test_setting_page_show()
    {
        $response = $this->get(route('setting.index'));
        $response->assertViewIs('admin::Settings.index');
        $response->assertSee('odda');
    }

    // /**
    //  * @return void
    //  */
    // public function test_setting_change_detail()
    // {
    //     $response = $this->post(route('setting.change'), [
    //         'target' => 'logoFavicon',
    //     ]);

    //     $response->assertViewHas('admin::Settings.logoFavicon');
    // }

    /**
     * @return void
     */
    public function test_general_setting_change_detail()
    {
        $generalSetting = GeneralSetting::where('id', 1)->first();

        $response = $this->post(route('update.generalSetting', $generalSetting->id), [
            'siteName' => 'hotel_booking',
            'primaryEmail' => 'hotel@gmail.com',
            'contactNumber' => '9865327410',
            'timeZone' => 'Asia/Tokyo',
            'selectCurrency' => 'AMD',
            'currencySymbol' => 'AMD',
        ]);

        $generalSetting = GeneralSetting::where('id', 1)->first();
        $this->assertEquals($generalSetting->site_name, 'hotel_booking');
        $this->assertEquals($generalSetting->primary_email, 'hotel@gmail.com');
        $this->assertEquals($generalSetting->contact_number, '9865327410');
        $this->assertEquals($generalSetting->time_zone, 'Asia/Tokyo');
        $this->assertEquals($generalSetting->currency, 'AMD');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_email_setting()
    {
        $response = $this->post(route('update.emailSetting'), [
            'id' => 1,
            'host_name' => 'smtp.google.com',
            'port_name' => '443',
            'encryption' => 'ssh',
            'username' => 'demo@example.com',
            'password' => 'ybcbhvuslqppowop',
            'fromemail' => 'demo@example.com',
            'fromname' => 'odda',
        ]);

        $EmailSetting = EmailSetting::where('id', 1)->first();
        $this->assertEquals($EmailSetting->host_name, 'smtp.google.com');
        $this->assertEquals($EmailSetting->port_name, '443');
        $this->assertEquals($EmailSetting->encryption, 'ssh');
        $this->assertEquals($EmailSetting->username, 'demo@example.com');
        $this->assertEquals($EmailSetting->password, 'ybcbhvuslqppowop');
        $this->assertEquals($EmailSetting->from_email, 'demo@example.com');
        $this->assertEquals($EmailSetting->from_name, 'odda');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_email_setting_show()
    {
        $response = $this->get(route('emailsetting.show'));
        // dd('hello');
    }

    /**
     * @return void
     */
    public function test_edit_email_template()
    {
        $response = $this->get(route('edit.emailTemplate'));
        // dd($response);
    }

    /**
     * @return void
     */
    public function test_update_email_template()
    {
        $response = $this->post(route('update.EmailTemplate'), [
            'mail_id' => 1,
            'mail_type' => 'Verify Email ',
            'mail_subject' => 'Verify Your Email Address Template',
            'mail_body' => '<p>verify your email address</p>',
        ]);

        $EmailTemplate = EmailTemplate::where('id', 1)->first();
        $this->assertEquals($EmailTemplate->mail_type, 'Verify Email');
        $this->assertEquals($EmailTemplate->mail_subject, 'Verify Your Email Address Template');
        $this->assertEquals($EmailTemplate->mail_body, '<p>verify your email address</p>');

        $response->assertStatus(200);
    }

    /**
     *
     * @return void
     */
    public function test_logo_and_favicon_detail()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('logoFavicon.show'));
        $logoFavicon = LogoFavicon::first();
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_logo()
    {
        $logo = UploadedFile::fake()->image('logo.jpg');
        $favicon = UploadedFile::fake()->image('favicon.jpg');

        $response = $this->post(route('update.logo'), [
            'logo' => $logo,
            'favicon' => $favicon,
        ]);

        $LogoFavicon = LogoFavicon::where('id', 1)->first();
        $this->assertDatabaseHas('logo_favicons', [
            'logo' => $LogoFavicon->logo,
            'favicon' => $LogoFavicon->favicon,
        ]);

        $this->assertTrue(\File::exists(public_path('/storage/' . $LogoFavicon->logo)));
        $this->assertTrue(\File::exists(public_path('/storage/' . $LogoFavicon->favicon)));

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_favicon()
    {
        $response = $this->post(route('delete.favicon', 1));

        $LogoFavicon = LogoFavicon::where('id', 1)->first();
        $this->assertNull($LogoFavicon->favicon);
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_delete_logo()
    {
        $response = $this->post(route('delete.logo', 1));

        $LogoFavicon = LogoFavicon::where('id', 1)->first();
        $this->assertNull($LogoFavicon->logo);
        $response->assertStatus(200);
    }

}
