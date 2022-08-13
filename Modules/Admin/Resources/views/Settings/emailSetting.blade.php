<div class="email-setting">
    <div class="email-header d-flex justify-content-between align-items-center mb-5">
        <h3 class="mb-0 fs-4">Email Configuration</h3>
        <a href="javascript:;">
            <button type="submit" class="btn btn-success emailSettingBtn">{{ isset($EmailSetting) ? 'Update' : 'Create'  }} </button>
        </a>
    </div>
    {{-- <h3 class="mb-5 fs-4">Email Configuration</h3> --}}
    <div class="row">
        <div class="col-lg-4 pb-3">
            <input type="hidden" class="id" value="{{ isset($EmailSetting) ? $EmailSetting->id : '' }}" >

            <label for="labelInput" class="form-label ">SMTP host</label>
            <input type="text" class="form-control host_name" id="labelInput" placeholder="SMTP host" value="{{ isset($EmailSetting) ? $EmailSetting->host_name : '' }}">
            <span class="text-danger" id="hostname-error"></span>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="labelInput" class="form-label ">SMTP port</label>
            <input type="text" class="form-control port_name" id="labelInput" placeholder="SMTP port" value="{{ isset($EmailSetting) ?  $EmailSetting->port_name  : '' }}">
            <span class="text-danger" id="portname-error"></span>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="labelInput" class="form-label ">Encryption</label>
            <input type="text" class="form-control encryption" id="labelInput" placeholder="Encryption" value="{{ isset($EmailSetting) ? $EmailSetting->encryption : ''  }}">
            <span class="text-danger" id="encryption-error"></span>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="labelInput" class="form-label ">SMTP Username</label>
            <input type="text" class="form-control username" id="labelInput" placeholder="SMTP Username" value="{{ isset($EmailSetting) ? $EmailSetting->username : ''  }}">
            <span class="text-danger" id="username-error"></span>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="labelInput" class="form-label ">SMTP Password</label>
            <input type="text" class="form-control password" id="labelInput" placeholder="SMTP Password" value="{{ isset($EmailSetting) ? $EmailSetting->password : ''  }}">
            <span class="text-danger" id="password-error"></span>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="labelInput" class="form-label ">From Email</label>
            <input type="text" class="form-control fromemail" id="labelInput" placeholder="From Email" value="{{ isset($EmailSetting) ? $EmailSetting->from_email : ''  }}">
            <span class="text-danger" id="fromemail-error"></span>
        </div>
        <div class="col-lg-4 pb-3">
            <label for="labelInput" class="form-label ">From Name</label>
            <input type="text" class="form-control fromname" id="labelInput" placeholder="From Name" value="{{ isset($EmailSetting) ? $EmailSetting->from_name : ''  }}">
            <span class="text-danger" id="fromname-error"></span>
        </div>
        {{-- <div class="send-btn text-end">
            <a href="javascript:;" >
                <button type="submit" class="btn btn-primary emailSettingBtn">{{ isset($EmailSetting) ? 'Update' : 'Create'  }} </button>
            </a>
        </div> --}}
    </div>
</div>
