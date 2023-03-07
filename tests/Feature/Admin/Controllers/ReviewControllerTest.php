<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminLogin();
    }

    /**
     * Review List
     *
     * @return void
     */
    public function test_review_list()
    {
        $reviews = Review::paginate(10);
        $response = $this->get(route('review.index'));

        $response->assertSee($reviews);
        $response->assertViewIs('admin::review.index');
    }

    /**
     * Review Filter Detail
     *
     * @return void
     */
    public function test_review_filter_details()
    {
        $response = $this->get(route('review.list'));

        $search = 'property_1';

        $data['reviews'] = Review::with('hotel')
            ->whereHas('hotel', function ($q) use ($search) {
                $q->where('property_name', 'like', '%' . $search . '%');
            })->paginate(10);
        $response->assertSee($data['reviews']);
        $response->assertViewIs('admin::review.reviewList');
    }
}
