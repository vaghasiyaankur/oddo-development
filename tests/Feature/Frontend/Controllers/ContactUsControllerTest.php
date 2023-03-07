<?php

namespace Tests\Feature\Frontend\Controllers;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactUsControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        // $this->adminLogin();
    }

    /**
     * Contact US Form
     *
     * @return void
     */
    public function test_contact_us_page()
    {
        $response = $this->get(route('contact.index'));
        $response->assertViewIs('frontend::contactUs.index');
    }

    /**
     * Add Contact Us detail
     *
     * @return void
     */
    public function test_contact_us_add_detail()
    {
        $response = $this->post(route('user.contact'), [
            'name' => 'user_test',
            'email' => 'user_test@gmail.com',
            'subject' => 'Request to Modify Reservation (Booking Reference: 56SD23ERDFG)',
            'message' => 'I would like to modify my reservation by room, specifically Room No.12',
        ]);

        $contact = Contact::latest()->first();
        $this->assertEquals($contact->name, 'user_test');
        $this->assertEquals($contact->email, 'user_test@gmail.com');
        $this->assertEquals($contact->subject, 'Request to Modify Reservation (Booking Reference: 56SD23ERDFG)');
        $this->assertEquals(
            $contact->message,
            'I would like to modify my reservation by room, specifically Room No.12'
        );

        // $data = ['name' => 'user_test',
        //     'email' => 'jemin.codetrinity@gmail.com',
        //     'subject' => 'Request to Modify Reservation (Booking Reference: 56SD23ERDFG)',
        //     'message' => 'I would like to modify my reservation by room, specifically Room No.12',
        // ];

        // $emailAdd = EmailSetting::select('from_email')->first();

        // Mail::to($emailAdd['from_email'])->send(new ContactMail($data));

        // $this->assertTrue(Mail::failures());

        $response->assertStatus(200)->assertJson(['success' => 'Message has been sent.', 'status' => 1]);
    }
}
