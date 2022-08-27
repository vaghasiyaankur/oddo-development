<div class="col-lg-4">
    <input type="hidden" class="razorpay_payment_id" value="{{$paymentGateway->id}}">
    <a class="payment--select-box mb-3 mb-lg-0 payment_button_{{$paymentGateway->payment_type}}" href="javascript:;" data-id={{$hotel->UUID}}>
        <div class="payment-logo d-flex align-items-center ">
            <img class="payment_logo_icon me-2" src="{{ asset('storage/' . $paymentGateway['payment_icon']) }}" alt="">
            <h6 class="card-title mb-0 text-dark">{{$paymentGateway->payment_type}}</h6>
        </div>
    </a>
</div>
