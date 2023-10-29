

  <style type="text/css">
  .center {
    display: block;
    margin: auto;
    /*margin-left: auto;
    margin-right: auto;*/
    border: black;
    border-width: 2px;
    width: 100%;
    height: 100%;
    /*width: 538px;*/
    /*height: 1038px;*/
    background-image: url('https://lifecyclebd.org/images/logo/idcard.jpeg');
    background-repeat: no-repeat;
  }

    /* Create two equal columns that floats next to each other */
.column-1 {
  float: left;
  width: 40%;
  /*padding: 10px;*/
  /*height: 300px; */
}
.column-2 {
  float: left;
  width: 60%;
  padding-left: 10px;
  /*height: 300px; */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>



  <div class="center">
  <div class="row" style="padding-top: 225px">
    <div class="column-1">
      @if($user_info->pic_path == null)
        <img src="{{ public_path('images\logo\profilepic.jpg') }}" style="padding-left: 55px; width: 152px; height: 140px;">
      @elseif(strpos($user_info->pic_path,"lifecyclebd.org"))
        <img src="{{ $user_info->pic_path }}" style="padding-left: 55px; width: 152px; height: 140px;">
      @else
        <img src="{{ asset('') }}{{ $user_info->pic_path }}" style="padding-left: 55px; width: 152px; height: 140px;">
      @endif
    </div>
    <div class="column-2">
      <h3>ID: LCBD {{ $user_info->id }}</h3>
      <h3>Blood Group: {{ $user_info->blood_group }}</h3>
      <h3>Mobile: {{ $user_info->phone }}</h3>
    </div>
    <div class="row">
      <p style="padding-top: 10px; padding-left: 45px; "> &nbsp;</p>
      <h3 style="padding-left: 45px; ">Name: {{ $user_info->fname }} {{ $user_info->lname }}</h3>
      <h4 style="padding-left: 45px;">District: {{ $user_info->district }} &nbsp;&nbsp;&nbsp;&nbsp; Thana: {{ $user_info->upazila }}</h4>
    </div>
  </div>
</div>









