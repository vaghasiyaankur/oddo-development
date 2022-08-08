<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\LogoFavicon;
use App\Models\GeneralSetting;
use File;

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
        $logoFavicon = LogoFavicon::first();
        $GeneralSetting = GeneralSetting::first();
        return view('admin::settings.index', compact('logoFavicon', 'currencies', 'GeneralSetting'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function updateLogo(Request $request)
    {
        if (!isset($_FILES['logo']) && !isset($_FILES['favicon'])) {
            return response()->json(["error" => "please select logo or favicon."], 403);
        } 

        $logo = $request->file('logo');
        $favicon = $request->file('favicon');
        $LogoFavicon = LogoFavicon::first();


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
        return response()->json(["success" => "logo update Successfully"], 200);
    }

    public function deleteFavicon($id)
    {
        $LogoFavicon = LogoFavicon::where('id',$id)->first();

        $path = public_path()."/storage/".@$LogoFavicon->favicon;
        $result = File::exists($path);
        if($result) File::delete($path);

        $LogoFavicon->favicon = null;
        $LogoFavicon->update();

        return response()->json(["error" => "favicon delete Successfully"], 200);
    }   

    public function deleteLogo($id)
    {
        $LogoFavicon = LogoFavicon::where('id',$id)->first();

        $path = public_path()."/storage/".@$LogoFavicon->logo;
        $result = File::exists($path);
        if($result) File::delete($path);

        $LogoFavicon->logo = null;
        $LogoFavicon->update();

        return response()->json(["error" => "logo delete Successfully"], 200);
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
}
