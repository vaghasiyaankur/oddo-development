<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Pages;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the page.
     * @return Renderable
     */
    public function index()
    {
        $pages = Pages::paginate(10);
        return view('admin::pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::pages.create');
    }

    /**
     * Store a newly created page in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:pages,title',
            'slug' => 'required|unique:pages,slug',
            'content' => 'required|min:20',
        ]);

        $id = '';
        $pages = Pages::updateOrCreate(['UUID' => $id], [
            'title' => $request->title,
            'slug' => $request->slug,
            'meta_description' => $request->description,
            'meta_key' => $request->keywords,
            'location' => $request->location,
            'status' => $request->status,
            'show_title' => $request->titleShow,
            'description' => $request->content,
        ]);

        return response()->json(["success" => "page inserted Successfully", 'redirect_url' => route('pages.index')]);
    }

    /**
     * Show the form for editing the specified page.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $page = Pages::whereUuid($id)->first();
        return view('admin::pages.edit', compact('page'));
    }

    /**
     * Update the specified page in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $validated = $request->validate([
            'title' => 'required|unique:pages,title,' . $id . ',UUID',
            'slug' => 'required|unique:pages,slug,' . $id . ',UUID',
            'content' => 'required|min:20',
        ]);

        $pages = Pages::updateOrCreate(['UUID' => $id], [
            'title' => $request->title,
            'slug' => $request->slug,
            'meta_description' => $request->description,
            'meta_key' => $request->keywords,
            'location' => $request->location,
            'status' => $request->status,
            'show_title' => $request->titleShow,
            'description' => $request->content,
        ]);

        return response()->json(["success" => "page updated Successfully", 'redirect_url' => route('pages.index')]);
    }

    /**
     * Remove the specified page from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $result = pages::where('UUID', $id)->delete();
            return response()->json(["danger" => "page deleted Successfully"], 200);
        } catch (\Exception$e) {
            return response()->json(["message" => "Something Went Wrong", "error" => $e->getMessage()], 503);
        }
    }

    /**
     * Display a listing of the page in search.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function pageList(Request $request)
    {
        $search = $request->input('search');
        $data['pages'] = pages::latest()->where('title', 'LIKE', "%{$search}%")->paginate(10);
        return view('admin::pages.pages_list', $data);
    }
}
