@extends('layout::admin.master')

@push('css')
<style>

</style>
@endpush

@section('content')
    <div class="page-content px-4">
        Booking
    </div>
    <!-- End Page-content -->
@endsection

@push('scripts')
    @include('admin::room.scripts')
@endpush
