
@extends('frontend.base')

@section('content')

<div class="d-flex justify-content-end mb-4">
    <a class="btn btn-primary" style="margin:auto;" href="{{ URL::to('idcard/pdf') }}">Download ID Card</a>
</div>



<style type="text/css">
  .center {
    display: block;
    margin: auto;
    /*margin-left: auto;
    margin-right: auto;*/
    border: black;
    border-width: 2px;
    width: 538px;
    height: 1038px;
    background-image: url('images/logo/idcard.jpeg');
  }
</style>


{{-- <div class="center" style="background-image: url('images/logo/idcard.jpeg');"> --}}
<div class="center">
  <div class="row" style="padding-top: 225px">
    <div class="col-5">
      @if($user_info->pic_path == null)
        <img src="{{ asset('') }}images/logo/profilepic.jpg" style="padding-left: 55px; width: 208px; height: 140px;">
      @elseif(strpos($user_info->pic_path,"lifecyclebd.org"))
        <img src="{{ $user_info->pic_path }}" style="padding-left: 55px; width: 208px; height: 140px;">
      @else
        <img src="{{ asset('') }}{{ $user_info->pic_path }}" style="padding-left: 55px; width: 208px; height: 140px;">
      @endif
    </div>
    <div class="col-7">
      <h3>ID: LCBD {{ $user_info->id }}</h3>
      <h3>Blood Group: {{ $user_info->blood_group }}</h3>
      <h3>Mobile: {{ $user_info->phone }}</h3>
    </div>
  </div>
  <div>
    <h3 style="padding-top: 10px; padding-left: 45px; ">Name: {{ $user_info->fname }} {{ $user_info->lname }}</h3>
    <h4 style="padding-left: 45px;">District: {{ $user_info->district }} &nbsp;&nbsp;&nbsp;&nbsp; Thana: {{ $user_info->upazila }}</h4>
  </div>
  {{-- <h2 style="padding-top: 220px; padding-left: 230px; ">ID: LCBD 1</h2>
  <h2 style="padding-left: 230px; ">Blood Group: O-</h2>
    <h2 style="padding-left: 230px; ">Mobile: 01xxxxxxxxx</h2>
  <h2 style="padding-top: 25px; padding-left: 50px; ">Name: Abul Bashar Muhammad Golam Rabbni</h2>
  <h3 style="padding-left: 50px;">District: Brahmanbaria &nbsp;&nbsp;&nbsp;&nbsp; Thana: Brahmanbaria Sadar</h3> --}}
</div>


@endsection
