@extends('layout::user.Frontend.master')

@section('title')
    {{$page->title}}
@endsection

@push('css')
@endpush

@section('content')
<div class="page" style="min-height:calc(100vh - 361px);">
    {!! $page->description !!}
</div>
@endsection

@push('script')
@endpush