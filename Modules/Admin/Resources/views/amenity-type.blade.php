@extends('layout::admin.master')

@push('css')
@endpush

@section('content')
    <div class="page-content px-4">
        <div class="row">
            <div class="col-lg-4">
                <h4 class="">Amenity-Category Add Form </h4>
                <div class="card" style="border-radius: 0.75rem;">
                    <div class="card-body">
                        <form class="amenityCategoryForm" method="post" action="javascript:void(0)">
                            <div class="mb-3">
                                <label class="form-label" for="amenitycateogry">Add Amenity Category</label>
                                <input type="text" class="form-control amenityCategory" id="amenitycateogry"
                                    placeholder="Enter Amenity Category" value="{{ old('name') }}">
                                <span class="text-danger" id="amenityCategory-error"></span>
                            </div>
                            <button class="btn btn-success amenity-category-submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h4 class="">Amenity-Category List </h4>
                <div class="card" id="orderList" style="border-radius: 0.75rem;">
                    <div class="card-body border border-end-0 border-start-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0 ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sl</th>
                                                <th scope="col">Amenity-Category</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody">
                                            @foreach ($amenityCategories as $key => $amenityCategory)
                                                <tr class="tr_{{ $amenityCategory->id }}">
                                                    <th scope="row"><a href="#"
                                                            class="fw-medium">{{ $amenityCategory->id }}</a></th>
                                                    <td>{{ $amenityCategory->category }}</td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="SwitchCheck1"
                                                                {{ $amenityCategory->status == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            data-amenitycategory='{{ $amenityCategory->id }}'
                                                            class="link-success fs-17 pe-3 edit-amenityCategory"><i
                                                                class="ri-edit-2-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger fs-17"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
    <!-- End Page-content -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.amenity-category-submit', function() {
                let amenityCategory = $('.amenityCategory').val();
                !amenityCategory ? $(`#amenityCategory-error`).html(
                    `The Amenitycategory field is required.`) : $(`#amenityCategory-error`).html(``);

                if (!amenityCategory) {
                    return;
                }

                formdata = new FormData();
                formdata.append('amenityCategory', amenityCategory);

                $.ajax({
                    url: "{{ route('add.amenitycategory') }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function(res) {
                        if (res.amenityCategories) {
                            $('.tbody').append('<tr class="tr_' + res.amenityCategories.id +
                                '"><th scope="row"><a href="#" class="fw-medium">' + res
                                .amenityCategories.id + '</a></th><td>' + res
                                .amenityCategories.category +
                                '</td><td><div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch id="SwitchCheck1" ></div></td><td> <a href="javascript:void(0);" class="link-success fs-17 pe-3"><i class="ri-edit-2-line"></i></a> <a href="javascript:void(0);" class="link-danger fs-17"><i class="ri-delete-bin-line"></i></a></td></tr>'
                                );

                            $("input[type=text]").val("");
                        }
                    },
                });
            });

            $(document).on('click', '.edit-amenityCategory', function() {

                $id = $(this).data('amenitycategory');

                formdata = new FormData();
                formdata.append('id', $id);

                $.ajax({
                    url: "{{ route('edit.amenitycategory') }}",
                    type: "GET",
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function(response) {

                    }
                });
            });
        });
    </script>
@endpush
