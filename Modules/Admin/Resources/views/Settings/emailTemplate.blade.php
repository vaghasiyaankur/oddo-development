<div class="email-template">
    <h3 class="mb-5 fs-4">Mail Templates</h3>
    <div class="live-preview">
        <div class="table-responsive">
            <table class="table align-middle table-nowrap mb-0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mail Type</th>
                        <th scope="col">Mail Subject</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mailTemplates as $key => $mailTemplate)
                    <tr>

                        <th scope="row">
                            {{$key + 1}}
                        </th>
                        <td>{{$mailTemplate->mail_type}}</td>
                        <td>{{$mailTemplate->mail_subject}}</td>
                        <td>
                            <a href="javascript:;" class="link-success btn btn-success text-white editEmailTemplate" data-id="{{$mailTemplate->id}}">
                                <i class=" ri-pencil-fill align-middle"></i>
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>