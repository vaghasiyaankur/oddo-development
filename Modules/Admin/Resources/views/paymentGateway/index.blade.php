@extends('layout::admin.master')
@section('title', 'Payment Gateway')
@push('css')
    <style>
        .payment-logo .payment_logo_icon {
            width: 100%;
            max-width: 48px;
            max-height: 48px;
        }
        .payment_main_div .payment_div .Payment_InputDetails{
            position: relative !important;
        }
        .card-radio .form-check-input:checked+.form-check-label {
            border-color: #405189 !important;
            background: aliceblue;
        }

        .card-radio .form-check-input:checked+.form-check-label:before {
            content: "" !important;
        }

        /* payment box loding css start */
        .spinner-container {
            position: absolute;
            background-color: #fff;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            display: none;
            text-align: center;
        }

        .spinner {
            margin: auto;
            border: 4px solid #dbf2ff;
            width: 40px;
            height: 40px;
            display: inline-block;
            position: absolute;
            top: 45%;
            border-radius: 50%;
            border-right: 4px solid #0ab39c;
            text-align: center;
            animation-name: spin;
            animation-duration: 900ms;
            animation-iteration-count: infinite;
            animation-timing-function: cubic-bezier(0.53, 0.21, 0.29, 0.67);
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }
        /* payment box loding css end */
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
