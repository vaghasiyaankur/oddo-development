<div class="col-xxl-4 col-lg-6 payment_div">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="payment-logo d-flex align-items-center ">
                <img class="payment_logo_icon pe-3" src="{{ asset('storage/' . $paymentGateways[1]['payment_icon']) }}"
                    alt="">
                <h6 class="card-title mb-0">{{ $paymentGateways[1]['payment_type'] }}</h6>
            </div>
            <div class="form-check form-switch form-switch-success fs-5">
                <input class="form-check-input payment_status" type="checkbox" role="switch" id="SwitchCheck3" {{ $paymentGateways[1]['status'] == 1 ? "checked" : " " }} data-value="{{ $paymentGateways[1]['payment_type'] }}">
            </div>
        </div>
        <div class="card-body px-4">
            <form class="stripeForm" method="post" action="javascript:void(0):;">
                <input type="hidden" class="form-control stripe_id" value="{{ $paymentGateways[1]['UUID'] }}">
                <div class="paypal-status mb-2">
                    <h6>Mode</h6>
                    <div class="status-card d-flex align-items-center justify-content-between">
                        <div class="form-check card-radio w-100 me-4">
                            <input id="StripeMethod01" name="StripeMethod" type="radio"
                                class="form-check-input stripe_mode" value="test" {{$paymentGateways[1]['mode'] == 'test' ? 'checked' : '' }} data-value='{{ $paymentGateways[1]['payment_type'] }}'>
                            <label class="form-check-label py-2 text-center" for="StripeMethod01">Test</label>
                        </div>
                        <div class="form-check card-radio w-100">
                            <input id="StripeMethod02" name="StripeMethod" type="radio"
                                class="form-check-input stripe_mode" value="live" {{$paymentGateways[1]['mode'] == 'live' ? 'checked' : '' }} data-value='{{ $paymentGateways[1]['payment_type'] }}'>
                            <label class="form-check-label py-2 text-center" for="StripeMethod02">Live</label>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Stripe Client ID</label>
                    <input type="text" class="form-control stripe_client_id" value="{{ $paymentGateways[1]["mode"] == "test" ? $paymentGateways[1]["test_client_id"]  : $paymentGateways[1]["live_client_id"] }}">
                    <span id="stripe_client_id_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label>Stripe Client Secret</label>
                    <input type="text" class="form-control stripe_secret_key" value="{{ $paymentGateways[1]["mode"] == "test" ? $paymentGateways[1]["test_client_secret_key"]  : $paymentGateways[1]["live_client_secret_key"] }}">
                    <span id="stripe_secret_key_error" class="text-danger"></span>
                </div>
            </form>
        </div>
        <div class="card-footer px-4">
            <a href="javascript:void(0);" class="btn btn-success w-100 fs-5 updateStripe">Update Your details</a>
        </div>
    </div>
</div>