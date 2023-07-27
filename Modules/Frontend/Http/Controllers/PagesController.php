<?php

namespace Modules\Frontend\Http\Controllers;

use App\Models\Pages;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{
    /**
     * Display the content of a specific page based on its slug.
     * 
     * @param string $slug The unique slug of the page to display.
     * @return Renderable
     */
    public function index($slug)
    {
        $page = Pages::whereSlug($slug)->first();
        return view('frontend::pages.index', compact('page'));
    }
}
