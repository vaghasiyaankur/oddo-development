<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\EmailSetting;
use App\Models\EmailTemplate;
use App\Models\GeneralSetting;
use App\Models\LogoFavicon;
use App\Models\ShortCodeMailTemplate;
use File;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $path = public_path() . '/json/currency.json';
        $currenciesFile = (string) file_get_contents($path);
        $currencies = json_decode($currenciesFile, true);
        $GeneralSetting = GeneralSetting::first();
        // $EmailSetting = EmailSetting::first();
        return view('admin::Settings.index', compact('currencies', 'GeneralSetting'));
    }

    /**
     * @param Request $request
     *
     * @return string $html
     */
    public function changeSetting(Request $request)
    {
        $logoFavicon = LogoFavicon::first();
        $html = view('admin::Settings.logoFavicon', compact('logoFavicon'))->render();

        if ($request->target == 'logoFavicon') {
            $logoFavicon = LogoFavicon::first();
            $html = view('admin::Settings.logoFavicon', compact('logoFavicon'))->render();

        } else if ($request->target == 'emailSetting') {
            $EmailSetting = EmailSetting::first();
            $html = view('admin::Settings.emailSetting', compact('EmailSetting'))->render();

        } else if ($request->target == 'generalSetting') {

            $path = public_path() . '/json/currency.json';
            $currenciesFile = (string) file_get_contents($path);
            $currencies = json_decode($currenciesFile, true);
            $GeneralSetting = GeneralSetting::first();
            $html = view('admin::Settings.generalSetting', compact('currencies', 'GeneralSetting'))->render();

        } else if ($request->target == 'emailTemplate') {

            $mailTemplates = EmailTemplate::get();
            $html = view('admin::Settings.emailTemplate', compact('mailTemplates'))->render();
        }

        return $html;
    }

    /**
     * update Logo function
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateLogo(Request $request)
    {
        // if (!isset($request->logo) && !isset($request->favicon)) {
        //     return response()->json(["status" => 0, "error" => "please select logo or favicon."]);
        // }

        $Validator = Validator::make($request->all(), [
            'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3072',
            'favicon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3072',
        ]);

        // validation massage
        if (!$Validator->passes()) {
            return response()->json(["status" => 0, 'errors' => $Validator->errors()->toArray()]);
        }

        $logo = $request->logo;
        $favicon = $request->favicon;
        $LogoFavicon = LogoFavicon::first();

        $logo_image = ($LogoFavicon->logo != null) ? $LogoFavicon->logo : $LogoFavicon->default_logo;
        $logo_image_favicon = ($LogoFavicon->favicon != null) ? $LogoFavicon->favicon : $LogoFavicon->default_favicon;

        if ($logo) {
            $logo_image = 'logo/img_' . rand(100000, 999999) . "." . $request->logo->extension();
            $path = 'storage/logo/';
            $logo->move(public_path($path), $logo_image);

            $path = public_path() . "/storage/" . @$LogoFavicon->logo;
            $result = File::exists($path);
            if ($result) {
                File::delete($path);
            }

            $LogoFavicon->logo = $logo_image;
        }

        if ($favicon) {
            $logo_image_favicon = 'logo/img_' . rand(100000, 999999) . "." . $favicon->GetClientOriginalExtension();
            $favicon->move(public_path('storage/logo/'), $logo_image_favicon);

            $path = public_path() . "/storage/" . @$LogoFavicon->favicon;
            $result = File::exists($path);
            if ($result) {
                File::delete($path);
            }

            $LogoFavicon->favicon = $logo_image_favicon;
        }
        $LogoFavicon->update();
        return response()->json(["status" => 1, "success" => "logo update Successfully", 'logo' => $logo_image, 'favicon' => $logo_image_favicon], 200);
    }

    /**
     * Remove the specified favicon from storage.
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFavicon($id)
    {
        $LogoFavicon = LogoFavicon::where('id', $id)->first();

        $path = public_path() . "/storage/" . @$LogoFavicon->favicon;
        $result = File::exists($path);
        if ($result) {
            File::delete($path);
        }

        $LogoFavicon->favicon = null;
        $LogoFavicon->update();

        $favicon = LogoFavicon::where('id', $id)->first();

        return response()->json(["error" => "favicon delete Successfully", 'favicon' => $favicon->default_favicon], 200);
    }

    /**
     * Remove the specified logo from storage.
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLogo($id)
    {
        $LogoFavicon = LogoFavicon::where('id', $id)->first();

        $path = public_path() . "/storage/" . @$LogoFavicon->logo;
        $result = File::exists($path);
        if ($result) {
            File::delete($path);
        }

        $LogoFavicon->logo = null;
        $LogoFavicon->update();

        $logo = LogoFavicon::where('id', $id)->first();

        return response()->json(["error" => "logo delete Successfully", 'logo' => $logo->default_logo], 200);
    }

    /**
     * General Setting update or create
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateGeneralSetting(Request $request)
    {
        $id = 1;
        $amenity = GeneralSetting::updateOrCreate(['id' => $id], [
            'site_name' => $request->siteName,
            'primary_email' => $request->primaryEmail,
            'contact_number' => $request->contactNumber,
            'time_zone' => $request->timeZone,
            'currency' => $request->selectCurrency,
            'currency_symbol' => $request->currencySymbol,
        ]);

        return response()->json(["success" => "general Setting update Successfully"], 200);
    }

    /**
     * Email Setting update or create
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEmailSetting(Request $request)
    {
        $id = $request->id;

        $EmailSetting = EmailSetting::updateOrCreate(['id' => $id], [
            'host_name' => $request->host_name,
            'port_name' => $request->port_name,
            'encryption' => $request->encryption,
            'username' => $request->username,
            'password' => $request->password,
            'from_email' => $request->fromemail,
            'from_name' => $request->fromname,
        ]);

        return response()->json(["success" => "Email Setting update Successfully"], 200);
    }

    /**
     * email Setting show
     * @return string $html
     */
    public function emailSettingShow()
    {
        $EmailSetting = EmailSetting::first();
        $html = view('admin::Settings.emailSetting', compact('EmailSetting'))->render();

        return $html;
    }

    /**
     * logoFavicon show
     * @return string $html
     */
    public function logoFaviconShow()
    {
        $logoFavicon = LogoFavicon::first();
        $html = view('admin::Settings.logoFavicon', compact('logoFavicon'))->render();
        return $html;
    }

    /**
     * email template show
     * @return string $html
     */
    public function emailTemplateShow()
    {
        $mailTemplates = EmailTemplate::get();
        $html = view('admin::Settings.emailTemplate', compact('mailTemplates'))->render();
        return $html;
    }

    /**
     * edit Template
     * @param Request $request
     *
     * @return string $html
     */
    public function editEditTemplate(Request $request)
    {
        $id = $request->id;
        $emailTemplate = EmailTemplate::where('id', $id)->first();

        $short_code_id = explode(',', $emailTemplate->short_code_id);
        $ShortCodes = ShortCodeMailTemplate::whereIn('id', $short_code_id)->get();
        $html = view('admin::Settings.editEmailTemplate', compact('emailTemplate', 'ShortCodes'))->render();
        return $html;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEmailTemplate(Request $request)
    {
        $id = $request->mail_id;

        $EmailSetting = EmailTemplate::updateOrCreate(['id' => $id], [
            'mail_type' => $request->mail_type,
            'mail_subject' => $request->mail_subject,
            'mail_body' => $request->mail_body,
        ]);

        return response()->json(["success" => "Update Mail template Successfully"], 200);
    }

}
