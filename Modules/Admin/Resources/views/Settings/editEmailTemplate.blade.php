<div class="update-mail">
    <div class="update-mail-header d-flex justify-content-between align-items-center flex-wrap mb-5">
        <h3 class="mb-0 fs-4">Update Mail Template</h3>
        <div class="send-btn">
            <a href="javascript:;">
                <button type="submit" class="btn btn-success MailTemplateUpdate">Update</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 px-0 px-sm-2">
            <form id="mailTemplateForm" class="mailTemplateForm">
                <input type="hidden" class="mail_id" value="{{$emailTeamplate->id}}">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="form-group">
                            <label for="">Mail Type</label>
                            <input type="text" class="form-control text-capitalize mail_type" name="mail_type"
                                value="{{$emailTeamplate->mail_type}}" readonly="">
                            <span class="text-danger" id="mail_type-error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Mail Subject*</label>
                            <input type="text" class="form-control mail_subject" name="mail_subject"
                                placeholder="Enter Mail Subject" value="{{$emailTeamplate->mail_subject}}">
                                <span class="text-danger" id="mail_subject-error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Mail Body*</label>
                        <div id="summernote createCKEditor"  name="content" class="facilityDescription mail_body">{{$emailTeamplate->mail_body}}</div>
                        <textarea name="content" class="facilityDescription mail_body" id="createCKEditor">{{$emailTeamplate->mail_body}}</textarea>
                        <span class="text-danger" id="mail_body-error"></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-5 mt-lg-0 mt-3 px-0 mx-0 px-0 px-sm-2">
            <table class="tables table-striped mb-5 w-100" style="border: 1px solid #0000005a;">
                <thead>
                    <tr>
                        <th scope="col">Short Code</th>
                        <th scope="col">Meaning</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {customer_name}
                        </td>
                        <th scope="row">
                            Customer Name
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {booking_number}
                        </td>
                        <th scope="row">
                            Booking Number
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var theEditor;
    ClassicEditor.create(document.querySelector('#createCKEditor')).then(editor => {
        theEditor = editor;
    }).catch(error => {
        console.error(error);
    });

    function getDataFromTheEditor() {
        return theEditor.getData();
    }
</script>
