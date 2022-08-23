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
            @include('admin::paymentGateway.paypal')
            
            {{-- stripe payment gateway form --}}
            @include('admin::paymentGateway.stripe')

            {{-- razorPay payment gateway form --}}
            @include('admin::paymentGateway.razorpay')
        </div>
    </div>
    <!-- End Page-content -->
@endsection

@push('scripts')
    @include('admin::paymentGateway.scripts')
@endpush
