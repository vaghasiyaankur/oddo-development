<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\LogoFavicon;
use File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $logoFavicon = LogoFavicon::first();
        return view('admin::settings.index', compact('logoFavicon'));
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
        $whiteBackground = $request->file('whiteBackground');
        $blackBackground = $request->file('blackBackground');
        $favicon = $request->file('favicon');
        $logo = LogoFavicon::first();

        if($whiteBackground) {
            $logo_image_whiteBackground =  'logo/img_'.rand(100000,999999).".".$whiteBackground->GetClientOriginalExtension();
            $whiteBackground->move(public_path('storage/logo/'),$logo_image_whiteBackground);
            
            $path = public_path()."/storage/".@$logo->white_background;
            $result = File::exists($path);
            if($result) File::delete($path);
            
            $logo->white_background = $logo_image_whiteBackground;
        }
        
         if($blackBackground) {
            $logo_image_blackBackground =  'logo/img_'.rand(100000,999999).".".$blackBackground->GetClientOriginalExtension();
            $blackBackground->move(public_path('storage/logo/'),$logo_image_blackBackground);
            
            $path = public_path()."/storage/".@$logo->black_background;
            $result = File::exists($path);
            if($result) File::delete($path);

            $logo->black_background = $logo_image_blackBackground;
        }
        
        if($favicon){
            $logo_image_favicon =  'logo/img_'.rand(100000,999999).".".$favicon->GetClientOriginalExtension();
            $favicon->move(public_path('storage/logo/'),$logo_image_favicon);
            
            $path = public_path()."/storage/".@$logo->favicon;
            $result = File::exists($path);
            if($result) File::delete($path);
    
            $logo->favicon = $logo_image_favicon;
        }
        $logo->update();
        return response()->json(["success" => "logo update Successfully"], 200);
    }
}
