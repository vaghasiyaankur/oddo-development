<table class="table align-middle mb-0 propertyList" id="propertyList">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Amount</th>
            <th scope="col">Description</th>
            <th scope="col">User</th>
            <th scope="col">Payment Method </th>
            <th scope="col">Payment</th>
            <th scope="col">Hotel</th>
        </tr>
    </thead>
    <tbody class="table__body">
        @forelse ($payments as $key=> $payment)
        <tr>
            <th scope="row">
                <div class="loadingShow td-2">
                    <span></span>
                </div>
                <div class="loadingHide">{{$payments->firstItem()+$key}}</div>
            </th>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{$payment->amount}}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{$payment->description}}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{$payment->user->name}} {{$payment->user->last_name}}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="loadingHide">{{$payment->paymentGateway->payment_type}}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="form-check form-switch loadingHide"> {{$payment->payment_id}}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
                <div class="form-check form-switch loadingHide"> {{$payment->hotel->property_name}}</div>
            </td>
            <td>
                <div class="loadingShow td-3">
                    <span></span>
                </div>
            </td>
        </tr>
        @empty

        @endforelse

    </tbody>
</table>


@if(count($payments))
<div class="table-footer align-items-center pt-2 justify-content-between d-flex">
    {{$payments->withPath('/admin/payments')->links('admin::layouts.pagination')}}
</div>
@else
{{-- FOR EMPTY TABLE --}}
<div class="empty-table w-100 text-center py-5">
    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
        colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
    </lord-icon>
    <h4>No records has been added yet.</h4>
</div>
@endif
