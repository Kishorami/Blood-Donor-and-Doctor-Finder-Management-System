@extends('frontend.base')

@section('content')

	@php
		$aboutUs = DB::table('about_u_s')->where('id',1)->first();
	@endphp
	<!-- Sub header -->
    <section class="space sub-header" style="background: url(templates/images/sub-header-bg.png) no-repeat #af2008; background-size: cover;">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub-header_content">
                        <p>ABOUT US</p>
                        <h3>{!! $aboutUs->head !!}</h3>
                        {{-- <span><i>Home / About Us</i></span> --}}
                        <p>
                        	{!! $aboutUs->body !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sub-header_main">
                        <h2>{!! $aboutUs->head !!}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Sub header -->

@endsection