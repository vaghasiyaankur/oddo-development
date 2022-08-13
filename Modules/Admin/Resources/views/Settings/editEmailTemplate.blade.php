<div class="update-mail">
    <div class="update-mail-header d-flex justify-content-between align-items-center mb-5">
        <h3 class="mb-0 fs-4">Update Mail Template</h3>
        <div class="send-btn">
            <a href="javascript:;">
                <button type="submit" class="btn btn-success generalSettingBtn">
                    <i class="ri-rewind-fill align-middle"></i>
                    Back
                </button>
            </a>
            <a href="javascript:;">
                <button type="submit" class="btn btn-success generalSettingBtn">Submit</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <form id="mailTemplateForm" class="mailTemplateForm">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Mail Type</label>
                            <input type="text" class="form-control text-capitalize" name="mail_type"
                                value="room booking" readonly="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Mail Subject*</label>
                            <input type="text" class="form-control" name="mail_subject"
                                placeholder="Enter Mail Subject" value="Confirmation of Room Booking">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <textarea name="content" class="facilityDescription" id="createCKEditor"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-5">
            <table class="tables table-striped mb-5 bbcodes-table" style="border: 1px solid #0000005a;">
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
                    <tr>
                        <td>
                            {booking_date}
                        </td>
                        <th scope="row">
                            Booking Date
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {number_of_night}
                        </td>
                        <th scope="row">
                            Number of Nights
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {check_in_date}
                        </td>
                        <th scope="row">
                            Check in Date
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {check_out_date}
                        </td>
                        <th scope="row">
                            Check out Date
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {number_of_guests}
                        </td>
                        <th scope="row">
                            Number of Guests
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {room_name}
                        </td>
                        <th scope="row">
                            Room Name
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {room_rent}
                        </td>
                        <th scope="row">
                            Room Rent
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {room_type}
                        </td>
                        <th scope="row">
                            Room Type
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {room_amenities}
                        </td>
                        <th scope="row">
                            Room Amenities
                        </th>
                    </tr>
                    <tr>
                        <td>
                            {website_title}
                        </td>
                        <th scope="row">
                            Website Title
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    let theEditor;
    ClassicEditor.create(document.querySelector('#createCKEditor')).then(editor => {
        theEditor = editor;
    }).catch(error => {
        console.error(error);
    });

    function getDataFromTheEditor() {
        return theEditor.getData();
    }

    let Editor;
    ClassicEditor.create(document.querySelector('#Editor')).then(editEditor => {
        Editor = editEditor;
    }).catch(error => {
        console.error(error);
    });

    function setDataFromEditor(desc) {
        return Editor.setData(desc);
    }
</script>