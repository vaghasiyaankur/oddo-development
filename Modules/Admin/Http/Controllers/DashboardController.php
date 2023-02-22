<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the dashboard.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::Dashboard.index');
    }

}
