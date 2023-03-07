<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminLogin();
    }

    /**
     * Payment List
     *
     * @return void
     */
    public function test_payment_list()
    {
        $payments = Payment::paginate(10);
        $response = $this->get(route('payment.index'));

        $response->assertSee('payments');
        $response->assertViewIs('admin::payment.index');
    }

    /**
     * Payment Filter Detail
     *
     * @return void
     */
    public function test_payment_filter_details()
    {
        $response = $this->get(route('payment.list'));

        $search = 'property_1';

        $data['payments'] = Payment::with('hotel')
            ->whereHas('hotel', function ($q) use ($search) {
                $q->where('property_name', 'like', '%' . $search . '%');
            })->paginate(10);
        $response->assertSee($data['payments']);
        $response->assertViewIs('admin::payment.paymentList');
    }
}
