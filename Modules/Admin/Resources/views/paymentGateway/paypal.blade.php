<div class="col-xxl-4 col-lg-6 payment_div">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="payment-logo d-flex align-items-center ">
                <img class="payment_logo_icon pe-3" src="{{ asset('storage/' . $paymentGateways[0]['payment_icon']) }}"
                    alt="">
                <h6 class="card-title mb-0">{{ $paymentGateways[0]['payment_type'] }}</h6>
            </div>
            <div class="form-check form-switch form-switch-success fs-5">
                <input class="form-check-input paypal_status" type="checkbox" role="switch" id="SwitchCheck3"  {{ $paymentGateways[0]['status'] == 1 ? "checked" : " " }} data-value="{{ $paymentGateways[0]['payment_type'] }}">
            </div>
        </div>
        {{-- paypal form --}}
        <div class="card-body px-4">
            <form class="paypalForm" method="post" action="javascript:void(0):;">
                <input type="hidden" class="paypal_UUID" value="{{ $paymentGateways[0]['UUID'] }}">
                <div class="paypal-status mb-2">
                    <h6>Mode</h6>
                    <div class="status-card d-flex align-items-center justify-content-between">
                        <div class="form-check card-radio w-100 me-4">
                            <input id="paypalMethod01" name="paypalMethod" type="radio"
                                class="form-check-input paypal_mode" value="test"
                                {{ $paymentGateways[0]['mode'] == 'test' ? 'checked' : '' }}
                                data-value='{{ $paymentGateways[0]['payment_type'] }}'>
                            <label class="form-check-label py-2 text-center" for="paypalMethod01">Test</label>
                        </div>
                        <div class="form-check card-radio w-100">
                            <input id="paypalMethod02" name="paypalMethod" type="radio"
                                class="form-check-input paypal_mode" value="live"
                                {{ $paymentGateways[0]['mode'] == 'live' ? 'checked' : '' }}
                                data-value='{{ $paymentGateways[0]['payment_type'] }}'>
                            <label class="form-check-label py-2 text-center" for="paypalMethod02">Live</label>
                        </div>
                    </div>
                </div>
                <div class="Payment_InputDetails">
                    <div class="spinner-container">
                        <div class="spinner">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label>Paypal Client ID</label>
                        <input type="text" class="form-control paypal_id"
                            value='{{ $paymentGateways[0]['mode'] == 'test' ? $paymentGateways[0]['test_client_id'] : $paymentGateways[0]['live_client_id'] }}'>
                        <span id="paypal_id_error" class="text-danger"></span>
                    </div>
                    <div class="form-group mb-2 ">
                        <label>Paypal Client Secret</label>
                        <input type="text" class="form-control paypal_key"
                            value="{{ $paymentGateways[0]['mode'] == 'test' ? $paymentGateways[0]['test_client_secret_key'] : $paymentGateways[0]['live_client_secret_key'] }}">
                        <span id="paypal_key_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Paypal Signature</label>
                        <input type="text" class="form-control paypal_api_key"
                            value="{{ $paymentGateways[0]['mode'] == 'test' ? $paymentGateways[0]['test_api_secret_key'] : $paymentGateways[0]['live_api_secret_key'] }}">
                        <span id="paypal_api_key_error" class="text-danger"></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer px-4">
            <a href="javascript:void(0);" class="btn btn-success w-100 fs-5 updatePaypal">Update Your details</a>
        </div>
    </div>
</div>
