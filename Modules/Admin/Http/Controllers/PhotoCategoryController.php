<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Photocategory;
use App\Models\HotelPhoto;

class PhotoCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $photoCategories = Photocategory::paginate(10);
        return view('admin::photoCategory.index',compact('photoCategories'));
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
        $validated   = $request->validate([
            'photoCategory'  => 'required|unique:photocategories,name',
        ], [ 
            'photoCategory.unique' => 'This photo category already exists.' 
        ]);

        try {
            $Photocategory   =  new Photocategory();
            $Photocategory->name = $request->photoCategory;
            $Photocategory->save();
            return response()->json(["success" => "Photo Category inserted Successfully"], 200);
        }catch(\Exception $e){
            return response()->json(["message" => "Something Went Wrong"], 503);
        } 
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
        $validated   = $request->validate([
            'photoCategory'  => 'required|unique:photocategories,name,'.$id.',id',
        ], [ 
            'photoCategory.unique' => 'This photo Category already exists.' 
        ]);
        
        try{
            $Photocategory   =  Photocategory::updateOrCreate([ 'id' => $id ], [
                'name' => $request->photoCategory
            ]);
            return response()->json(["success" => "Photo Category updated Successfully"], 200);
        }catch(\Exception $e){
            return response()->json(["error" => "Something Went Wrong"], 503);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $count = HotelPhoto::where('category_id',$id)->count();
            if($count != 0){
                return response()->json(["warning" => "Photo Category not deleted"], 200);
            }else{
                $roomType = Photocategory::where('id',$id)->delete();
                return response()->json(["danger" => "Photo Category deleted Successfully"], 200);
            }
        }catch(\Exception $e){
            return response()->json(["message" => "Something Went Wrong"], 503);
        } 
    }

    public function photoList(Type $var = null)
    {
        $data['photoCategories'] = Photocategory::paginate(10);
        return view('admin::photoCategory.photoCategory_list', $data);
    }

    public function photoCategoryStatus(Request $request){
        $status = $request->status;
        $id     = $request->id;
        if($status == '1') {
            $facility = Photocategory::where('id', $id)->update([ 'status' => 0 ]);
            return response()->json(["message" => "room type status updated Successfully"], 200);
        }else {
            $facility = Photocategory::where('id', $id)->update([ 'status' => 1 ]);
            return response()->json(["message" => "room type status updated Successfully"], 200);
        }
    }
}
