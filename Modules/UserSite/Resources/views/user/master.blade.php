@extends('layout::user.UserSite.master')

@section('title')
Add-Layout
@endsection
@section('title', 'Add Layout')
@section('meta_description', 'Page Add Layout')
@section('meta_keywords', 'Page, Add  Layout')


@push('css')
<link rel="stylesheet" href="{{asset('user/asset/css/user-style.css')}}">
@endpush


@section('content')
<section class="account-content">
    <div class="container">
        <div class="row py-4">
            @include('usersite::user.sidebar.sidebar')
            @yield('section')
        </div>
    </div>
</section>
@endsection


@push('scripts')

@endpush