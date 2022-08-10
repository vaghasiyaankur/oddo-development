<div class="general-setting">
    <h3 class="mb-5  fs-4">General Setting</h3>
    <div class="row">
        <div class="col-lg-4 pb-3">
            <label for="labelInput" class="form-label ">Site name</label>
            <input type="text" class="form-control siteName" id="labelInput" placeholder="user name" value="{{$GeneralSetting->site_name}}">
            <span class="text-danger" id="siteName-error"></span>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="labelInput" class="form-label ">primary email</label>
            <input type="email" class="form-control primaryEmail" id="labelInput" placeholder="email address" value="{{$GeneralSetting->primary_email}}">
            <span class="text-danger" id="primaryEmail-error"></span>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="labelInput" class="form-label ">contact number</label>
            <input type="number" class="form-control contactNumber" id="labelInput" placeholder="1235245" value="{{$GeneralSetting->contact_number}}">
            <span class="text-danger" id="contactNumber-error"></span>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="exampleInputdate" class="form-label">TimeZone</label>
            <select name="timezone" id="timezone" class="form-select timeZone">

                @foreach (timezone_identifiers_list() as $timezone)
                    <option value="{{ $timezone }}" {{ $timezone == $GeneralSetting->time_zone ? 'selected' : '' }}>{{ $timezone }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="exampleInputdate" class="form-label">Currency : <span class="currencySpan"></span></label>
            <select class="form-select mb-3 selectCurrency" aria-label="Default select example">
                <option disabled>Select your Status </option>
                @foreach ($currencies as $currency) 
                    <option value="{{$currency['code']}}" data-id="{{$currency['symbol']}}" {{ $currency['code'] == $GeneralSetting->currency ? 'selected' : '' }}>{{$currency['code']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="exampleInputdate" class="form-label ">Currency symbol</label>
            <input type="text" class="form-control symbol currencySymbol" id="labelInput" placeholder="Currency symbol" value="{{$GeneralSetting->symbol}}">
            <span class="text-danger" id="currencySymbol-error"></span>
        </div>
        <div class="send-btn text-end">
            <a href="javascript:;" >
                <button type="submit" class="btn btn-primary generalSettingBtn">Update</button>
            </a>
        </div>
    </div>
</div> 