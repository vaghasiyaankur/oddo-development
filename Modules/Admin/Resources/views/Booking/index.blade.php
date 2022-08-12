@extends('layout::admin.master')
@section('title','Booking')
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
