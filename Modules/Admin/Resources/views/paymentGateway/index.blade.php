@extends('layout::admin.master')
@section('title', 'Payment Gateway')
@push('css')
    <style>
        .payment-logo .payment_logo_icon {
            width: 100%;
            max-width: 48px;
            max-height: 48px;
        }

        .card-radio .form-check-input:checked+.form-check-label {
            border-color: #405189 !important;
            background: aliceblue;
        }

        .card-radio .form-check-input:checked+.form-check-label:before {
            content: "" !important;
        }
    </style>
@endpush

@section('content')
    <div class="page-content px-4">
        <div class="payment-title">
            <h4 class="mb-4">Payment Gateways</h4>
        </div>
        <div class="row payment_main_div">
            {{-- paypal payment gateway form --}}
            <div class="col-xxl-4 col-lg-6 payment_div">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="payment-logo d-flex align-items-center ">
                            <img class="payment_logo_icon pe-3" src="{{ asset('storage/' . $paymentGateways[0]['payment_icon']) }}"
                                alt="">
                            <h6 class="card-title mb-0">{{ $paymentGateways[0]['payment_type'] }}</h6>
                        </div>
                        <div class="form-check form-switch form-switch-success fs-5">
                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3" checked="">
                        </div>
                    </div>
                    <div class="card-body px-4">
                        <form class="paypalForm" method="post" action="javascript:void(0):;">
                            <input type="hidden" class="paypal_UUID" value="{{ $paymentGateways[0]['UUID'] }}">
                            <div class="paypal-status mb-2">
                                <h6>{{ $paymentGateways[0]['payment_type'] }} Status</h6> 
                                <div class="status-card d-flex align-items-center justify-content-between">
                                    <div class="form-check card-radio w-100 me-4">
                                        <input id="paypalMethod01" name="paypalMethod" type="radio"
                                            class="form-check-input" {{$paymentGateways[0]['status'] == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label py-2 text-center" for="paypalMethod01">Active</label>
                                    </div>
                                    <div class="form-check card-radio w-100">
                                        <input id="paypalMethod02" name="paypalMethod" type="radio"
                                            class="form-check-input" {{$paymentGateways[0]['status'] == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label py-2 text-center" for="paypalMethod02">Deactive</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label>Paypal Client ID</label>
                                <input type="text" class="form-control paypal_id" value="{{ $paymentGateways[0]['client_id'] }}">
                                <span id="paypal_id_error" class="text-danger"></span>
                            </div>
                            <div class="form-group mb-2 ">
                                <label>Paypal Client Secret</label>
                                <input type="text" class="form-control paypal_key" value="{{ $paymentGateways[0]['client_secret_key'] }}">
                                <span id="paypal_key_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Paypal Signature</label>
                                <input type="text" class="form-control paypal_api_key" value="{{ $paymentGateways[0]['api_secret_key'] }}">
                                <span id="paypal_api_key_error" class="text-danger"></span>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer px-4">
                        <a href="javascript:void(0);" class="btn btn-success w-100 fs-5 updatePaypal">Update Your details</a>
                    </div>
                </div>
            </div>

            {{-- stripe payment gateway form --}}
            <div class="col-xxl-4 col-lg-6 payment_div">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="payment-logo d-flex align-items-center ">
                            <img class="payment_logo_icon pe-3" src="{{ asset('storage/' . $paymentGateways[1]['payment_icon']) }}"
                                alt="">
                            <h6 class="card-title mb-0">{{ $paymentGateways[1]['payment_type'] }}</h6>
                        </div>
                        <div class="form-check form-switch form-switch-success fs-5">
                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3">
                        </div>
                    </div>
                    <div class="card-body px-4">
                        <form>
                            <div class="paypal-status mb-2">
                                <h6>{{ $paymentGateways[1]['payment_type'] }} Status</h6>
                                <div class="status-card d-flex align-items-center justify-content-between">
                                    <div class="form-check card-radio w-100 me-4">
                                        <input id="StripeMethod01" name="StripeMethod" type="radio"
                                            class="form-check-input" {{$paymentGateways[1]['status'] == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label py-2 text-center" for="StripeMethod01">Active</label>
                                    </div>
                                    <div class="form-check card-radio w-100">
                                        <input id="StripeMethod02" name="StripeMethod" type="radio"
                                            class="form-check-input" {{$paymentGateways[1]['status'] == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label py-2 text-center" for="StripeMethod02">Deactive</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label>Stripe Client ID</label>
                                <input type="text" class="form-control" name="client_id" value="{{ $paymentGateways[1]['client_id'] }}">
                            </div>
                            <div class="form-group">
                                <label>Stripe Client Secret</label>
                                <input type="text" class="form-control" name="client_id" value="{{ $paymentGateways[1]['client_secret_key'] }}">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer px-4">
                        <a href="javascript:void(0);" class="btn btn-success w-100 fs-5 updateStripe">Update Your details</a>
                    </div>
                </div>
            </div>

            {{-- razorPay payment gateway form --}}
            <div class="col-xxl-4 col-lg-6 payment_div">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="payment-logo d-flex align-items-center ">
                            <img class="payment_logo_icon pe-3" src="{{ asset('storage/' . $paymentGateways[2]['payment_icon']) }}"
                                alt="">
                            <h6 class="card-title mb-0">{{ $paymentGateways[2]['payment_type'] }}</h6>
                        </div>
                        <div class="form-check form-switch form-switch-success fs-5">
                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3"
                                checked="">
                        </div>
                    </div>
                    <div class="card-body px-4">
                        <form>
                            <div class="paypal-status mb-2">
                                <h6>{{ $paymentGateways[2]['payment_type'] }} Status</h6>
                                <div class="status-card d-flex align-items-center justify-content-between">
                                    <div class="form-check card-radio w-100 me-4">
                                        <input id="RazorpayMethod01" name="RazorpayMethod" type="radio"
                                            class="form-check-input"  {{$paymentGateways[2]['status'] == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label py-2 text-center" for="RazorpayMethod01">Active</label>
                                    </div>
                                    <div class="form-check card-radio w-100">
                                        <input id="RazorpayMethod02" name="RazorpayMethod" type="radio"
                                            class="form-check-input" {{$paymentGateways[2]['status'] == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label py-2 text-center" for="RazorpayMethod02">Deactive</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label>Razorpay Client ID</label>
                                <input type="text" class="form-control" name="client_id" value="{{ $paymentGateways[2]['client_id'] }}">
                            </div>
                            <div class="form-group">
                                <label>Razorpay Client Secret</label>
                                <input type="text" class="form-control" name="client_id" value="{{ $paymentGateways[2]['client_secret_key'] }}">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer px-4">
                        <a href="javascript:void(0);" class="btn btn-success w-100 fs-5">Update Your details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->
@endsection

@push('scripts')
    @include('admin::paymentGateway.scripts')
@endpush
