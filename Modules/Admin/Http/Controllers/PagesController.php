<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Pages;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pages = Pages::paginate(10);
        return view('admin::pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::pages.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $id = '';
        $pages = Pages::updateOrCreate([ 'UUID' => $id ], [
            'title' => $request->title,
            'slug' => $request->slug,
            'meta_description' => $request->description,
            'meta_key' => $request->keywords,
            'location' => $request->location,
            'status' => $request->status,
            'show_title' => $request->titleShow,
            'description' => $request->content
        ]);

        return response()->json(["success" => "page inserted Successfully", 'redirect_url' => route('pages.index') ]);
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
        $page = Pages::whereUuid($id)->first();
        return view('admin::pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {

        $id = $request->id;
        $pages = Pages::updateOrCreate([ 'UUID' => $id ], [
            'title' => $request->title,
            'slug' => $request->slug,
            'meta_description' => $request->description,
            'meta_key' => $request->keywords,
            'location' => $request->location,
            'status' => $request->status,
            'show_title' => $request->titleShow,
            'description' => $request->content
        ]);

        return response()->json(["success" => "page updated Successfully", 'redirect_url' => route('pages.index') ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $result = pages::where('UUID',$id)->delete();
            return response()->json(["danger" => "page deleted Successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    public function pageList(Request $request){
        $data['pages'] = pages::paginate(10);
        return view('admin::pages.pages_list', $data);
    }
}
