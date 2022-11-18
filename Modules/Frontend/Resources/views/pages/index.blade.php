@extends('layout::user.Frontend.master')

@section('title')   {{$pageData->title}} @endsection
@section('meta_description') {{$pageData->meta_description}} @endsection
@section('meta_keywords') {{$pageData->meta_key}} @endsection

@push('css')
<style>
    .page{
        text-align: center;
        margin-top: 25px;
    }
</style>
@endpush

@section('content')
<div class="pages">
    <div class="container">
        <div class="multi-s-title text-center">
            <h5>{{$pageData->show_title == 1 ? $pageData->title : ''}}</h5>
        </div>

        <div class="page" style="min-height:calc(100vh - 361px);">
            {!! $pageData->description !!}
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush