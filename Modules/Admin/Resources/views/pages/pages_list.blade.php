<table class="table align-middle mb-0 ">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Visibility</th>
            <th scope="col">Show Title</th>
            {{-- <th scope="col">Date</th> --}}
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="table__body">
        @if(count($pages))
            @foreach ($pages as $key => $page)
                <tr>
                    <th scope="row">
                        <div class="loadingShow td-2">
                            <span></span>
                        </div>
                        <div class="loadingHide">{{$key+1}}</div>
                    </th>
                    <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="loadingHide">{{$page->title}}</div>
                    </td>
                    <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="loadingHide">{{$page->slug}}</div>
                    </td>
                    <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="loadingHide">
                            <a href="javascript:;">
                            @if($page->status == 1)
                                <button class="btn btn-success fs-12 px-2 py-1">Active</button>
                            @else
                                <button class="btn btn-danger fs-12 px-2 py-1">Deactive</button>
                            @endif
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="loadingHide">
                            @if($page->show_title == 1)
                            <button class="btn btn-success fs-12 px-2 py-1">Active</button>
                            @else
                                <button class="btn btn-danger fs-12 px-2 py-1">Deactive</button>
                            @endif
                        </div>
                    </td>
                    {{-- <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="form-check form-switch loadingHide">
                            <input class="form-check-input status" type="checkbox" role="switch" id="SwitchCheck1" {{ $page->status == 1 ? 'checked': ''}} data-value="{{ $page }}">
                        </div>
                    </td> --}}
                    <td>
                        <div class="loadingShow td-3">
                            <span></span>
                        </div>
                        <div class="loadingHide">
                            <a href="{{ Route('page.edit', ['id' => $page->UUID]) }}" class="link-success fs-17 pe-3 editFacility" >
                                <i class="ri-edit-2-line"></i>
                            </a>

                            <a href="javascript:void(0);" class="link-danger fs-17 deletePage" data-value="{{$page->UUID}}">
                                <i class="ri-delete-bin-line"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

@if(count($pages))
    <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
        {{$pages->withPath('/admin/pages')->links('admin::layouts.pagination')}}
    </div>
@else
    {{-- FOR EMPTY TABLE --}}
    <div class="empty-table w-100 text-center py-5">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
        </lord-icon>
        <h4>No record has been found.</h4>
    </div>     
@endif