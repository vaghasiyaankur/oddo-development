<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\PaymentGetways;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentGatewayControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminLogin();
    }

    /**
     * @return void
     */
    public function test_payment_gateway_index()
    {
        $paymentGateways = PaymentGetways::get();
        $response = $this->get(route('paymentGateway.index'));
        $response->assertSee('Payment Gateways');
        $response->assertViewIs('admin::paymentGateway.index');
    }

    /**
     * @return void
     */
    public function test_payment_gateways_status()
    {
        $response = $this->post(route('paymentGateways.status'), [
            'status' => 0,
            'type' => 'Paypal',
        ]);

        $paymentGateways = PaymentGetways::where('payment_type', 'Paypal')->first();
        $this->assertEquals(0, $paymentGateways->status);
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_paypal()
    {
        $paymentGateways = PaymentGetways::where('payment_type', 'Paypal')->select('UUID')->first();
        $response = $this->post(route('update.paypal', $paymentGateways->UUID), [
            'paypal_mode' => 'live',
            'paypal_id' => 'Hm9cvyu_v8w-gRkli4cfh5ltjx7zjeC9BOOv8Q9WdEAhOesCFB0thnCV-eiX0AqCHDbWjrSJ',
            'paypal_key' => 'lkraPbYJOqLofZ6ZUxEHBIgrAtICNkiQsPjrYjucqKC2yeUN4em-svKeH8m7JRq5uy',
            'paypal_api_key' => 'yvzJzMA7LLy0RbLNz6wf5.JAxW3DjFapVPyvzJzMA7LLy0RbLNz6wf5.JAxW3DjFapVP',
        ]);

        $paymentGateways = PaymentGetways::where('payment_type', 'Paypal')->first();

        $this->assertEquals(
            $paymentGateways->live_client_id,
            'Hm9cvyu_v8w-gRkli4cfh5ltjx7zjeC9BOOv8Q9WdEAhOesCFB0thnCV-eiX0AqCHDbWjrSJ'
        );
        $this->assertEquals(
            $paymentGateways->live_client_secret_key,
            'lkraPbYJOqLofZ6ZUxEHBIgrAtICNkiQsPjrYjucqKC2yeUN4em-svKeH8m7JRq5uy'
        );
        $this->assertEquals(
            $paymentGateways->live_api_secret_key,
            'yvzJzMA7LLy0RbLNz6wf5.JAxW3DjFapVPyvzJzMA7LLy0RbLNz6wf5.JAxW3DjFapVP'
        );
        $this->assertEquals($paymentGateways->mode, 'live');

        $response = $this->post(route('update.paypal', $paymentGateways->UUID), [
            'paypal_mode' => 'test',
            'paypal_id' => 'Rkli4cfh5ltjx7zjeC9BOOv8Q9WdEAhOesCFB0thnCV-eiX0AqCHDbWjrSJ',
            'paypal_key' => 'lkraPbYJOqLofZ6ZUxEHBIgrAtICNkiQsPjrYjucqKC2yeUN4em',
            'paypal_api_key' => 'JAxW3DjFapVPyvzJzMA7LLy0RbLNz6wf5',
        ]);

        $paymentGateways = PaymentGetways::where('payment_type', 'Paypal')->first();

        $this->assertEquals(
            $paymentGateways->test_client_id,
            'Rkli4cfh5ltjx7zjeC9BOOv8Q9WdEAhOesCFB0thnCV-eiX0AqCHDbWjrSJ'
        );
        $this->assertEquals(
            $paymentGateways->test_client_secret_key,
            'lkraPbYJOqLofZ6ZUxEHBIgrAtICNkiQsPjrYjucqKC2yeUN4em'
        );
        $this->assertEquals(
            $paymentGateways->test_api_secret_key,
            'JAxW3DjFapVPyvzJzMA7LLy0RbLNz6wf5'
        );
        $this->assertEquals($paymentGateways->mode, 'test');

        $response->assertStatus(200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function test_show_paypal()
    {
        $paymentGateways = PaymentGetways::where('payment_type', 'Paypal')->first();
        $response = $this->json('Get', route('show.paypal'), [
            'mode' => 'test',
            'type' => 'Paypal',
        ]);

        $response->assertStatus(200)
            ->assertJson(['mode' => 'test']);
    }

    /**
     * @return void
     */
    public function test_update_stripe()
    {
        $paymentGateways = PaymentGetways::where('payment_type', 'Stripe')->first();

        $response = $this->post(route('update.stripe', $paymentGateways->UUID), [
            'stripe_client_id' =>
            'pk_live_51K9n5Y51cqGBjyWPOiXVlXOscQvsBuRtZ2j6i7laSxpsHiN0xONkr2MDs1CsHBNni9wNvuNyNlb2k00HjvTADGG',
            'stripe_secret_key' =>
            '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',
            'stripe_mode' => 'live',
        ]);

        $paymentGateways = PaymentGetways::where('payment_type', 'Stripe')->first();

        $this->assertEquals(
            $paymentGateways->live_client_id,
            'pk_live_51K9n5Y51cqGBjyWPOiXVlXOscQvsBuRtZ2j6i7laSxpsHiN0xONkr2MDs1CsHBNni9wNvuNyNlb2k00HjvTADGG'
        );
        $this->assertEquals(
            $paymentGateways->live_client_secret_key,
            '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'
        );
        $this->assertEquals($paymentGateways->mode, 'live');

        $response = $this->post(route('update.stripe', $paymentGateways->UUID), [
            'stripe_client_id' =>
            'pk_test_51K9n5Y51cqGBjyWPOiXVlXOscQvsBuRtZ2j6i7laSxpsHiN0xONkr2MDs1CsHBNni9wNvuNyNlb2k00HjvTADGG',
            'stripe_secret_key' =>
            'sk_test_5SEHRtZ2j6imHtkYo3tz0lNjKpalEnOfQ2h1tA8LGMIPKYYUnB5vQTyQLZx4hmKlESakTsc00gPyoXlqXmO40NewuPBjL',
            'stripe_mode' => 'test',
        ]);

        $paymentGateways = PaymentGetways::where('payment_type', 'Stripe')->first();

        $this->assertEquals(
            $paymentGateways->test_client_id,
            'pk_test_51K9n5Y51cqGBjyWPOiXVlXOscQvsBuRtZ2j6i7laSxpsHiN0xONkr2MDs1CsHBNni9wNvuNyNlb2k00HjvTADGG'
        );
        $this->assertEquals(
            $paymentGateways->test_client_secret_key,
            'sk_test_5SEHRtZ2j6imHtkYo3tz0lNjKpalEnOfQ2h1tA8LGMIPKYYUnB5vQTyQLZx4hmKlESakTsc00gPyoXlqXmO40NewuPBjL'
        );
        $this->assertEquals($paymentGateways->mode, 'test');

        $response->assertStatus(200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function test_show_stripe()
    {
        $mode = 'test';
        $response = $this->json('get', route('show.stripe'), [
            'mode' => 'test',
            'type' => 'Stripe',
        ]);

        $paymentGateways = PaymentGetways::where('payment_type', 'Stripe')->first();
        $response->assertStatus(200)
            ->assertJson(['mode' => 'test']);
    }

    /**
     * @return void
     */
    public function test_update_razorpay()
    {
        $paymentGateways = PaymentGetways::where('payment_type', 'Razorpay')->first();
        $response = $this->post(route('update.razorpay', $paymentGateways->UUID), [
            'razor_client_id' => 'rzp_test_INvuNyNlb2k00HjvTADGG',
            'razor_client_secret_key' => 'ESakTsc00gPyoXlqXmO40NewuPBjL',
            'razorpay_mode' => 'live',
        ]);

        $paymentGateways = PaymentGetways::where('payment_type', 'Razorpay')->first();

        $this->assertEquals(
            $paymentGateways->live_client_id,
            'rzp_test_INvuNyNlb2k00HjvTADGG'
        );
        $this->assertEquals(
            $paymentGateways->live_client_secret_key,
            'ESakTsc00gPyoXlqXmO40NewuPBjL'
        );
        $this->assertEquals($paymentGateways->mode, 'live');

        $paymentGateways = PaymentGetways::where('payment_type', 'Razorpay')->first();
        $response = $this->post(route('update.razorpay', $paymentGateways->UUID), [
            'razor_client_id' => 'rzp_Test_INvuNyNlb2k00HjvTADGG',
            'razor_client_secret_key' => 'Esddasadadasdc00gPyoXlqXmO40NewuPBjL',
            'razorpay_mode' => 'test',
        ]);

        $paymentGateways = PaymentGetways::where('payment_type', 'Razorpay')->first();

        $this->assertEquals(
            $paymentGateways->test_client_id,
            'rzp_Test_INvuNyNlb2k00HjvTADGG'
        );
        $this->assertEquals(
            $paymentGateways->test_client_secret_key,
            'Esddasadadasdc00gPyoXlqXmO40NewuPBjL'
        );
        $this->assertEquals($paymentGateways->mode, 'test');

        $response->assertStatus(200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function test_show_razorpay()
    {
        $mode = 'test';
        $response = $this->json('get', route('show.razorpay'), [
            'mode' => 'test',
            'type' => 'Razorpay',
        ]);

        $paymentGateways = PaymentGetways::where('payment_type', 'Razorpay')->first();
        $response->assertStatus(200)
            ->assertJson(['mode' => 'test']);
    }
}
