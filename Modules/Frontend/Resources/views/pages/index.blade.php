@extends('layout::user.Frontend.master')

@section('title')
    {{$pageData->title}}
@endsection

@push('css')
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