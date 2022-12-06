<div class="col-lg-4">
    <input type="hidden" class="stripe_payment_id" value="{{$paymentGateway->id}}">
    <a class="payment--select-box mb-3 mb-lg-0 payment_button_{{ $paymentGateway->payment_type}}" href="javascript:;"
        data-id={{$hotel->UUID}} data-value={{ $hotel->property_name }}>
        <div class="payment-logo d-flex align-items-center ">
            <img class="payment_logo_icon me-2" src="{{ asset('storage/' . $paymentGateway['payment_icon']) }}" alt="">
            <h6 class="card-title mb-0 text-dark">{{ $paymentGateway->payment_type}}</h6>
        </div>
    </a>
    <div class="spinner-stripe" role="status"
        style="display: none;position: relative;top:-52%;left:-45%;color: rgb(103 120 214);">
        <span class="sr-only">Loading...</span>
    </div>
</div>

{{-- " data-bs-toggle="modal" data-bs-target="#success_payment" --}}