
<div class="col-xxl-4 col-lg-6 payment_div paypal_div">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="payment-logo d-flex align-items-center ">
                <img class="payment_logo_icon pe-3" src="{{ asset('storage/' . $paymentGateways[2]['payment_icon']) }}"
                    alt="">
                <h6 class="card-title mb-0">{{ $paymentGateways[2]['payment_type'] }}</h6>
            </div>
            <div class="form-check form-switch form-switch-success fs-5">
                <input class="form-check-input razor_status" type="checkbox" role="switch" id="SwitchCheck3"
                {{ $paymentGateways[2]['status'] == 1 ? "checked" : " " }}>
            </div>
        </div>
        <div class="card-body px-4">
            <form class="razorForm" method="post" action="javascript:void(0):;">
                <input type="hidden" class="form-control razor_id" value="{{ $paymentGateways[2]['UUID'] }}">
                <div class="paypal-status mb-2">
                    <h6>Mode</h6>
                    <div class="status-card d-flex align-items-center justify-content-between">
                        <div class="form-check card-radio w-100 me-4">
                            <input id="RazorpayMethod01" name="RazorpayMethod" type="radio"
                                class="form-check-input razorpay_mode" value="test" {{$paymentGateways[2]['mode'] == 'test' ? 'checked' : '' }} data-value='{{ $paymentGateways[2]['payment_type'] }}'>
                            <label class="form-check-label py-2 text-center" for="RazorpayMethod01">Test</label>
                        </div>
                        <div class="form-check card-radio w-100">
                            <input id="RazorpayMethod02" name="RazorpayMethod" type="radio"
                                class="form-check-input razorpay_mode" value="live" {{$paymentGateways[2]['mode'] == 'live' ? 'checked' : '' }} data-value='{{ $paymentGateways[2]['payment_type'] }}'>
                            <label class="form-check-label py-2 text-center" for="RazorpayMethod02">Live</label>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Razorpay Client ID</label>
                    <input type="text" class="form-control razor_client_id" value="{{ $paymentGateways[2]["mode"] == "test" ? $paymentGateways[2]["test_client_id"]  : $paymentGateways[2]["live_client_id"] }}">
                    <span id="razor_client_id_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label>Razorpay Client Secret</label>
                    <input type="text" class="form-control razor_client_secret_key" value="{{ $paymentGateways[2]["mode"] == "test" ? $paymentGateways[2]["test_client_secret_key"]  : $paymentGateways[2]["live_client_secret_key"] }}">
                    <span id="razor_client_secret_key_error" class="text-danger"></span>
                </div>
            </form>
        </div>
        <div class="card-footer px-4">
            <a href="javascript:void(0);" class="btn btn-success w-100 fs-5 updateRazor">Update Your details</a>
        </div>
    </div>
</div>