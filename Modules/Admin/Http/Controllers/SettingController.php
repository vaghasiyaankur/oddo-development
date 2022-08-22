<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\LogoFavicon;
use App\Models\GeneralSetting;
use App\Models\EmailSetting;
use App\Models\EmailTemplate;
use App\Models\ShortCodeMailTemplate;
use File;
use Illuminate\Support\Facades\Config;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $path = public_path().'/json/currency.json';
        $currencies = json_decode(file_get_contents($path), true);
        $GeneralSetting = GeneralSetting::first();
        // $EmailSetting = EmailSetting::first();
        return view('admin::settings.index', compact('currencies', 'GeneralSetting'));
    }

    public function changeSetting(Request $request)
    {

        if($request->target == 'logoFavicon'){
            $logoFavicon = LogoFavicon::first();
            $html = view('admin::settings.logoFavicon', compact('logoFavicon'))->render();
            // return $html;

        }else if($request->target == 'emailSetting'){
            $EmailSetting = EmailSetting::first();
            $html = view('admin::settings.emailSetting', compact('EmailSetting'))->render();
            // return $html;

        }else if($request->target == 'generalSetting') {

            $path = public_path().'/json/currency.json';
            $currencies = json_decode(file_get_contents($path), true);
            $GeneralSetting = GeneralSetting::first();
            $html = view('admin::settings.generalSetting', compact('currencies', 'GeneralSetting'))->render();

        } else if($request->target == 'emailTemplate') {

            $mailTemplates = EmailTemplate::get();
            $html = view('admin::settings.emailTemplate', compact('mailTemplates'))->render();
        }
        else {

        }
        return $html;
    }

    public function updateLogo(Request $request)
    {
        if (!isset($_FILES['logo']) && !isset($_FILES['favicon'])) {
            return response()->json(["error" => "please select logo or favicon."], 403);
        }

        $logo = $request->file('logo');
        $favicon = $request->file('favicon');
        $LogoFavicon = LogoFavicon::first();

        $logo_image = ($LogoFavicon->logo != null) ? $LogoFavicon->logo : $LogoFavicon->default_logo;
        $logo_image_favicon = ($LogoFavicon->favicon != null) ? $LogoFavicon->favicon : $LogoFavicon->default_favicon;

        if($logo) {
            $logo_image =  'logo/img_'.rand(100000,999999).".".$logo->GetClientOriginalExtension();
            $logo->move(public_path('storage/logo/'),$logo_image);

            $path = public_path()."/storage/".@$LogoFavicon->logo;
            $result = File::exists($path);
            if($result) File::delete($path);

            $LogoFavicon->logo = $logo_image;
        }

        if($favicon){
            $logo_image_favicon =  'logo/img_'.rand(100000,999999).".".$favicon->GetClientOriginalExtension();
            $favicon->move(public_path('storage/logo/'),$logo_image_favicon);

            $path = public_path()."/storage/".@$LogoFavicon->favicon;
            $result = File::exists($path);
            if($result) File::delete($path);

            $LogoFavicon->favicon = $logo_image_favicon;
        }
        $LogoFavicon->update();
        return response()->json(["success" => "logo update Successfully", 'logo' => $logo_image, 'favicon' => $logo_image_favicon], 200);
    }

    public function deleteFavicon($id)
    {
        $LogoFavicon = LogoFavicon::where('id',$id)->first();

        $path = public_path()."/storage/".@$LogoFavicon->favicon;
        $result = File::exists($path);
        if($result) File::delete($path);

        $LogoFavicon->favicon = null;
        $LogoFavicon->update();

        $favicon = LogoFavicon::where('id',$id)->first();

        return response()->json(["error" => "favicon delete Successfully", 'favicon' => $favicon->default_favicon], 200);
    }

    public function deleteLogo($id)
    {
        $LogoFavicon = LogoFavicon::where('id',$id)->first();

        $path = public_path()."/storage/".@$LogoFavicon->logo;
        $result = File::exists($path);
        if($result) File::delete($path);

        $LogoFavicon->logo = null;
        $LogoFavicon->update();

        $logo = LogoFavicon::where('id',$id)->first();

        return response()->json(["error" => "logo delete Successfully", 'logo' => $logo->default_logo], 200);
    }

    public function updateGeneralSetting(Request $request)
    {
        $id = 1;
        $amenity   =  GeneralSetting::updateOrCreate([ 'id' => $id ], [
            'site_name' => $request->siteName ,
            'primary_email' => $request->primaryEmail ,
            'contact_number' => $request->contactNumber ,
            'time_zone' => $request->timeZone ,
            'currency' => $request->selectCurrency ,
            'currency_symbol' => $request->currencySymbol ,
        ]);

        return response()->json(["success" => "general Setting update Successfully"], 200);
    }

    public function updateEmailSetting(Request $request)
    {
        $id = $request->id;

        $EmailSetting   =  EmailSetting::updateOrCreate([ 'id' => $id ], [
            'host_name' => $request->host_name ,
            'port_name' => $request->port_name ,
            'encryption' => $request->encryption ,
            'username' => $request->username ,
            'password' => $request->password ,
            'from_email' => $request->fromemail ,
            'from_name' => $request->fromname ,
        ]);

        return response()->json(["success" => "Email Setting update Successfully"], 200);
    }

    public function emailSettingShow()
    {
        $EmailSetting = EmailSetting::first();
        $html = view('admin::settings.emailSetting', compact('EmailSetting'))->render();

        return $html;
    }

    public function logoFaviconShow() {
        $logoFavicon = LogoFavicon::first();
        $html = view('admin::settings.logoFavicon', compact('logoFavicon'))->render();
        return $html;
    }

    public function emailTemplateShow()
    {
        $mailTemplates = EmailTemplate::get();
        $html = view('admin::settings.emailTemplate', compact('mailTemplates'))->render();
        return $html;
    }

    public function editEditTemplate(Request $request) {
        $id = $request->id;
        $emailTemplate = EmailTemplate::where('id', $id)->first();

        $short_code_id = explode(',',$emailTemplate->short_code_id);
        $ShortCodes = ShortCodeMailTemplate::whereIn('id',$short_code_id)->get();
        $html = view('admin::settings.editEmailTemplate', compact('emailTemplate', 'ShortCodes'))->render();
        return $html;
    }

    public function updateEmailTemplate(Request $request) {
        $id = $request->mail_id;

        $EmailSetting   =  EmailTemplate::updateOrCreate([ 'id' => $id ], [
            'mail_type' => $request->mail_type ,
            'mail_subject' => $request->mail_subject ,
            'mail_body' => $request->mail_body,
        ]);

        return response()->json(["success" => "Update Mail template Successfully"], 200);
    }

}
