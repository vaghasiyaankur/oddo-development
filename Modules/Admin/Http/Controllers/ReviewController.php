<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Review;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the review.
     * @return Renderable
     */
    public function index()
    {
        $reviews = Review::paginate(10);
        return view('admin::review.index', compact('reviews'));
    }

    /**
     * Display a listing of the review in search.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function ReviewList(Request $request)
    {
        $search = $request->input('search');
        $data['reviews'] = Review::with('hotel')
            ->whereHas('hotel', function ($q) use ($search) {
                $q->where('property_name', 'like', '%' . $search . '%');
            })->paginate(10);
        return view('admin::review.reviewList', $data);
    }
}
