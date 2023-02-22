<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Pages;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the pages.
     * @param string $slug
     * @return Renderable
     */
    public function index($slug)
    {
        $page = Pages::whereSlug($slug)->first();
        return view('frontend::pages.index', compact('page'));
    }
}
