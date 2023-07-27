<?php

namespace Modules\Frontend\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\EmailSetting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mail;
use Validator;

class ContactUsController extends Controller
{
    /**
     * Display the contact us page.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('frontend::contactUs.index');
    }

    /**
     * Handle the contact form submission and send an email notification.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contact(Request $request)
    {
        // Validate the input data
        $Validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'The Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'please enter a valid email address',
            'subject.required' => 'The Subject field is required.',
            'message.required' => 'The Message field is required.',
        ]);
        if (!$Validator->passes()) {
            return response()->json(["status" => 0, 'errors' => $Validator->errors()->toArray()]);
        }

        $data = $request->all();
        Contact::create($request->all());

        $emailAdd = EmailSetting::select('from_email')->first();

        // Send the contact email
        Mail::to($emailAdd['from_email'])->send(new ContactMail($data));

        return response()->json(["status" => 1, "success" => "Message has been sent."], 200);

    }
}
