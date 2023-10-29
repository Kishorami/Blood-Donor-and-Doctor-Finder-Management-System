<div>
    <!--==================== Header ====================-->
    <header>
        <div class="banner--wrap">
            <div class="container">
                <div class="banner-slider">

                    @foreach($data['slider'] as $row)
                    <div class="banner">
                        <div class="row">
                            
                            <div class="col-12 col-md-12 col-lg-12 d-flex align-items-end">
                                <div class="anim-container flex-fill">
                                    <svg class="circle-svg" width="25%" height="25%" viewBox="0 0 754 733" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        
                                    </svg>

                                    {{-- <img src="{{$row->pic_path}}" class="img-fluid animated-hero" alt="hero" /> --}}

                                    @if(strpos($row->pic_path,"lifecyclebd.org"))
                                        <img src="{{$row->pic_path}}" class="img-fluid animated-hero" alt="hero" />
                                    @else
                                        <img src="{{ asset('') }}{{$row->pic_path}}" class="img-fluid animated-hero" alt="hero" />
                                    @endif

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <!-- // end .container -->
        </div>
        <!-- // end .bannerwrap -->
    </header>

    <!--//End Header -->
    
    <!--==================== Our Services ====================-->
    <section class="space light">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-style1">
                        {{-- <span>Our Services</span> --}}
                        <h2>রক্তদানের কিছু প্রয়োজনীয় কথা</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider">

                        @foreach($data['all_blood_info'] as $row)
                        <div class="service-block green">
                            <img src="{{ $row->pic_path }}" alt="#" style="height: 94px; width: 200px;" />
                            <h3>{{$row->title}}</h3>
                            {{-- <p> {!!mb_substr($row->description,0,200)!!} </p> --}}
                            <a href="{{ route('blood_info.details',['id'=>$row->id]) }}" class="btn btn-dark">আরো জানতে</a>
                            {{-- <div class="service-bg-icon">
                                <img src="{{ $row->pic_path }}" class="img-fluid" alt="#">
                            </div> --}}
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    <p class="text-center service-help_link">
                        Contact us for better help and services.
                        <a href="#">Let’s get started</a>
                    </p>
                </div>
            </div> --}}
        </div>
    </section>
    <!--//End Our Services -->

    <!--==================== Our Services ====================-->
    <section class="space light">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-style1">
                        {{-- <span>Our Services</span> --}}
                        <h2>আমাদের সেবাসমূহ</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider">

                        
                        <div class="service-block green">
                            <img src="{{ asset('images/icons/stethoscope.png') }}" alt="#" style="height: 40px; width: 40px;" />
                            <h3>ডাক্তার</h3>
                            <p> 
                                আমরা ২৪ ঘন্টাই প্রস্তুত আছি আপনাদের কথা শুনতে, সরাসরি এবং মোবাইলে। এছাড়াও আমরা জানিয়ে দিচ্ছি বাংলাদেশের সকল বিশেষজ্ঞ ডাক্তাররা কে, কোথায় , কখন বসছে এবং তাদের ফি সর্ম্পকে । 
                            </p>
                            <a href="/find_doctor" class="btn btn-dark">আরো জানতে</a>
                            {{-- <div class="service-bg-icon">
                                <img src="{{ $row->pic_path }}" class="img-fluid" alt="#">
                            </div> --}}
                        </div>

                        <div class="service-block blue">
                            <img src="{{ asset('images/icons/hospital.png') }}" alt="#" style="height: 40px; width: 40px;" />
                            <h3>হাসপাতাল</h3>
                            <p> 
                                দরিদ্রের জন্য অল্প ব্যয়ে উন্নত চিকিৎসা সেবা ও সকলের জন্য হাসপাতাল সম্পর্কিত জরুরী তথ্য যেমন জরুরী নম্বর, ডাক্তার গণের তালিকা, কি ধরনের চিকিৎসা করে ইত্যাদি সর্ম্পকে জানানো । 
                            </p>
                            <a href="/find_hospital" class="btn btn-dark">আরো জানতে</a>
                            {{-- <div class="service-bg-icon">
                                <img src="{{ $row->pic_path }}" class="img-fluid" alt="#">
                            </div> --}}
                        </div>

                        <div class="service-block green">
                            <img src="{{ asset('images/icons/ambulance.png') }}" alt="#" style="height: 40px; width: 40px;" />
                            <h3>এ্যাম্বুলেন্স</h3>
                            <p> 
                                যখন ও যেখানেই লাগবে জরুরী সেবায় ২৪ ঘন্টাই থাকবে আমাদের এ্যাম্বুলেন্স। এছাড়া ও বাংলাদেশের সকল হাসপাতালের এ্যাম্বুলেন্স নাম্বার, তাদের ফি সর্ম্পকিত যাবতীয় তথ্য পাওয়া যাবে এখানেই। 
                            </p>
                            <a href="/ambulance_info" class="btn btn-dark">আরো জানতে</a>
                            {{-- <div class="service-bg-icon">
                                <img src="{{ $row->pic_path }}" class="img-fluid" alt="#">
                            </div> --}}
                        </div>

                        <div class="service-block yellow">
                            <img src="{{ asset('images/icons/newspaper.png') }}" alt="#" style="height: 40px; width: 40px;" />
                            <h3>স্বাস্থ্য সংবাদ</h3>
                            <p> 
                                স্বাস্থ্য সর্ম্পকিত সকল সংবাদ এক ক্লিকেই আপনার হাতে। বাংলাদেশ সহ বিশ্বের সকল ধরনের প্রয়োজনীয় ও গুরুত্বপূর্ণ স্বাস্থ্য সংবাদগুলো আপনাদের প্রয়োজনে এখন লাইফ সাইকেলের হাতের মুঠোয়।
                            </p>
                            <a href="/news" class="btn btn-dark">আরো জানতে</a>
                            {{-- <div class="service-bg-icon">
                                <img src="{{ $row->pic_path }}" class="img-fluid" alt="#">
                            </div> --}}
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    <p class="text-center service-help_link">
                        Contact us for better help and services.
                        <a href="#">Let’s get started</a>
                    </p>
                </div>
            </div> --}}
        </div>
    </section>
    <!--//End Our Services -->

    <!--==================== Why Choose ====================-->
    <section class="space why-choose-block">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <h2>
                        স্বেচ্ছাসেবী আহবান
                    </h2>
                    <hr>
                    <p>
                       আমরা স্বপ্ন দেখি অসহায় মানুষগুলোকে হাসাতে, স্বপ্ন দেখি রক্তের জন্য মানুষের হাহাকার দূর করতে, স্বপ্ন দেখি চিকিৎসা সেবার মাধ্যমে বাঁচাতে অসহায়ের প্রাণ। আর সেই লক্ষ্যে লাইফসাইকেলবিডি এর সাথে আপনিও থাকতে পারেন, একজন স্বেচ্ছাসেবী হিসেবে । 
                    </p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <a type="button" data-toggle="modal" data-target="#volunteerModal" class="btn btn-dark" tabindex="0">যোগদান করুন</a> --}}
                            <a href="/volunteer_component" type="button" class="btn btn-dark" tabindex="0">যোগদান করুন</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 offset-lg-1">
                    <div class="why-choose_right">
                        <h2>
                            আর্থিক অনুদান
                        </h2>
                        <hr>
                        <p>
                            ব্লাড ক্যাম্পিং, মেডিকেল ক্যাম্পইন, এম্বুলেন্স সার্ভিস, স্বাস্থ্য ও চিকিৎসাসেবার মাধ্যমে অসহায় মানুষের মুখে হাসি ফুঁটাতে, জীবন-মৃত্যু সন্ধিক্ষণে প্রাণ বাঁচাতে আপনিও আর্থিক অনুদান দিয়ে লাইফসাইকেলবিডি এর সাথে থাকতে পারেন, একজন অনুদানকারী হিসেবে।
                        </p>
                        <hr>
                         <div class="row">
                            <div class="col-md-12">
                                {{-- <a type="button" data-toggle="modal" data-target="#donorModal" class="btn btn-dark" tabindex="0">দাতা হন</a> --}}
                                <a href="/fundraiser" type="button" class="btn btn-dark" tabindex="0">দাতা হন</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Why Choose -->

    <!--==================== Our Team ====================-->
    <section class="our-team">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    
                    <h4 style="text-align: center;">আসন্ন কর্মসূচী</h4>
                    <div class="banner--wrap">
                        <div class="container">
                            <div class="banner-slider">

                                @foreach($data['upcoming_event'] as $row)
                                <div class="banner">
                                    
                                        <a href="{{ route('event.details',['id'=>$row->id]) }}">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="anim-container flex-fill">
                                                <svg class="circle-svg" width="25%" height="25%" viewBox="0 0 754 733" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    
                                                </svg>
                                                
                                                    <img src="{{$row->pic_path}}" class="img-fluid animated-hero" alt="hero" />
                                                

                                            </div>
                                        </div>
                                        
                                        <br>
                                    <h3>
                                        {{$row->title}}
                                    </h3>
                                    </a>
                                </div>
                                
                                @endforeach

                            </div>
                        </div>
                        <!-- // end .container -->
                    </div>
                    <!-- // end .bannerwrap -->
            
                </div>

                <div class="col-md-6">
                    <h4 style="text-align: center;">স্বাস্থ্য বার্তা</h4>
                    <div class="banner--wrap">
                        <div class="container">
                            <div class="banner-slider">

                                @foreach($data['news3'] as $row)
                                <div class="banner">
                                    
                                        <a href="{{ route('news.details',['id'=>$row->id]) }}">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="anim-container flex-fill">
                                                <svg class="circle-svg" width="25%" height="25%" viewBox="0 0 754 733" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    
                                                </svg>
                                                
                                                    <img src="{{$row->pic_path}}" class="img-fluid animated-hero" alt="hero" />
                                                

                                            </div>
                                        </div>
                                        
                                        <br>
                                    <h3>
                                        {{$row->title}}
                                    </h3>
                                    </a>
                                </div>
                                
                                @endforeach

                            </div>
                        </div>
                        <!-- // end .container -->
                    </div>
                    <!-- // end .bannerwrap -->
                </div>
            </div>
        </div>
    </section>
    <!--//End Why Choose -->

    <!--==================== Our Team ====================-->
    <section class="our-team">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub-title_center">
                        {{-- <span>---- Our Team ----</span> --}}
                        <h2>আমরা কৃতজ্ঞ</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="doctors-slider">

                        @foreach($data['testimonial'] as $row)
                        <div class="team-img_block yellow">
                            <div class="team-img-socila-block">
                                <img src="{{$row->pic_path}}" class="img-fluid" alt="#" style="object-fit: fill; width: 210px; height: 140px;" />
                            </div>
                            <h4>{{$row->name}} <br> {{$row->designation}} , {{$row->institution}}</h4>
                            <p>{!! substr($row->description, 0, 500) !!}</p>

                            <ul class="nav-icon-wrap">
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.facebook.com/sharer/sharer.php?u=bsodbd.com&display=popup" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=&amp;p[title]=<?php echo $row->institution;?>&amp;p[summary]=<?php echo $row->designation;?>&amp;p[url]=<?php echo $row->pic_path;?>&amp;p[images][0]=<?php echo $row->pic_path;?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-facebook-f" style="font-size: 20px;"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo $row->pic_path.$row->designation.$row->institution; ?>+<?php echo "www.lifecycle.org";?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter" style="font-size: 20px;"></i></a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('viber://forward?text=<?php echo $row->pic_path.$row->designation.$row->institution; ?>+<?php echo "www.lifecycle.org";?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-viber" style="font-size: 20px;"></i></a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('https://api.whatsapp.com/send?text=<?php echo $row->pic_path.$row->designation.$row->institution; ?>+<?php echo "www.lifecycle.org";?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp" style="font-size: 20px;"></i></a>
                                </li>
                            </ul>

                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Our Team -->

    <!--==================== Our Team ====================-->
    <section class="our-team">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub-title_center">
                        {{-- <span>---- Our Team ----</span> --}}
                        <h2>রক্ত যোদ্ধা</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="doctors-slider">

                        @foreach($data['tobeprouds'] as $row)
                        <div class="team-img_block yellow">
                            <div class="team-img-socila-block">
                                {{-- {!! substr($row->pic_path, 7,500) !!} --}}
                                <img src="{{ $row->pic_path }}" class="img-fluid" alt="#" style="object-fit: fill; width: 210px; height: 231px;"/>
                            </div>
                            <h4></h4>
                            <p>{!! substr($row->reason_of_proud, 0, 500) !!}</p>

                            <ul class="nav-icon-wrap">
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.facebook.com/sharer/sharer.php?u=bsodbd.com&display=popup" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=&amp;p[title]=<?php echo $row->reason_of_proud;?>&amp;p[summary]=<?php echo $row->reason_of_proud;?>&amp;p[url]=<?php echo $row->pic_path;?>&amp;p[images][0]=<?php echo $row->pic_path;?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-facebook-f" style="font-size: 20px;"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo $row->pic_path.$row->reason_of_proud; ?>+<?php echo "www.lifecycle.org";?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter" style="font-size: 20px;"></i></a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('viber://forward?text=<?php echo $row->pic_path.$row->reason_of_proud; ?>+<?php echo "www.lifecycle.org";?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-viber" style="font-size: 20px;"></i></a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('https://api.whatsapp.com/send?text=http://lifecyclebd.org/<?php echo $row->pic_path.$row->reason_of_proud; ?>+<?php echo "www.lifecycle.org";?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp" style="font-size: 20px;"></i></a>
                                </li>
                            </ul>

                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Our Team -->

    <!--==================== Service Detail ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub-title_center">
                        {{-- <span>---- রক্তদাতা সংখ্যা  ----</span> --}}
                        <h2>আমাদের সর্বমোট রক্তদাতা সংখ্যাঃ  {{$this->EnglishToBangla($data['total_donor'])}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="service-detail_box primary-color-br">
                        <div class="service-detail-icon">
                            {{-- <div class="service-detail-svg-block primary-color" style="background: red;">
                                <img src="{{ asset('images/icons/blood-transfusion.png') }}" alt="#">
                            </div> --}}
                            <div class="" style="border-radius: 6px; padding: 14px;display: inline-block;">
                                <img src="{{ asset('images/bag/1.png') }}" alt="#" style="width: 70px;height: 80px;">
                            </div>
                            <h1 style="color: red; opacity: 1;">A+</h1>
                        </div>
                        <h6>সক্রিয় ডোনারঃ  {{$this->EnglishToBangla($data['a_positive'])}}</h6>
                        <h6>সর্বমোট ডোনারঃ  {{$this->EnglishToBangla($data['t_a_positive'] )}}</h6>
                        {{-- 
                        <p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore t dolore secus</p>
                        <a href="#">READ MORE</a> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-detail_box primary-color-br">
                        <div class="service-detail-icon">
                            {{-- <div class="service-detail-svg-block primary-color" style="background: red;">
                                <img src="{{ asset('images/icons/blood-transfusion.png') }}" alt="#">
                            </div> --}}
                            <div class="" style="border-radius: 6px; padding: 14px;display: inline-block;">
                                <img src="{{ asset('images/bag/2.png') }}" alt="#" style="width: 70px;height: 80px;">
                            </div>
                            <h1 style="color: red; opacity: 1;">B+</h1>
                        </div>
                        <h6>সক্রিয় ডোনারঃ  {{$this->EnglishToBangla($data['b_positive'] )}}</h6>
                        <h6>সর্বমোট ডোনারঃ  {{$this->EnglishToBangla($data['t_b_positive'] )}}</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-detail_box primary-color-br">
                        <div class="service-detail-icon">
                            {{-- <div class="service-detail-svg-block primary-color" style="background: red;">
                                <img src="{{ asset('images/icons/blood-transfusion.png') }}" alt="#">
                            </div> --}}
                            <div class="" style="border-radius: 6px; padding: 14px;display: inline-block;">
                                <img src="{{ asset('images/bag/3.png') }}" alt="#" style="width: 70px;height: 80px;">
                            </div>
                            <h1 style="color: red; opacity: 1;">O+</h1>
                        </div>
                        <h6>সক্রিয় ডোনারঃ  {{$this->EnglishToBangla($data['o_positive'] )}}</h6>
                        <h6>সর্বমোট ডোনারঃ  {{$this->EnglishToBangla($data['t_o_positive'] )}}</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-detail_box primary-color-br">
                        <div class="service-detail-icon">
                            {{-- <div class="service-detail-svg-block primary-color" style="background: red;">
                                <img src="{{ asset('images/icons/blood-transfusion.png') }}" alt="#">
                            </div> --}}
                            <div class="" style="border-radius: 5px; padding: 14px;display: inline-block;">
                                <img src="{{ asset('images/bag/4.png') }}" alt="#" style="width: 70px;height: 80px;">
                            </div>
                            <h1 style="color: red; opacity: 1;">AB+</h1>
                        </div>
                        <h6>সক্রিয় ডোনারঃ  {{$this->EnglishToBangla($data['ab_positive'] )}}</h6>
                        <h6>সর্বমোট ডোনারঃ  {{$this->EnglishToBangla($data['t_ab_positive'] )}}</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="service-detail_box primary-color-br">
                        <div class="service-detail-icon">
                            {{-- <div class="service-detail-svg-block primary-color" style="background: red;">
                                <img src="{{ asset('images/icons/blood-transfusion.png') }}" alt="#">
                            </div> --}}
                            <div class="" style="border-radius: 6px; padding: 14px;display: inline-block;">
                                <img src="{{ asset('images/bag/5.png') }}" alt="#" style="width: 70px;height: 80px;">
                            </div>
                            <h1 style="color: red; opacity: 1;">A-</h1>
                        </div>
                        <h6>সক্রিয় ডোনারঃ  {{$this->EnglishToBangla($data['a_negative'] )}}</h6>
                        <h6>সর্বমোট ডোনারঃ  {{$this->EnglishToBangla($data['t_a_negative'] )}}</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-detail_box primary-color-br">
                        <div class="service-detail-icon">
                            {{-- <div class="service-detail-svg-block primary-color" style="background: red;">
                                <img src="{{ asset('images/icons/blood-transfusion.png') }}" alt="#">
                            </div> --}}
                            <div class="" style="border-radius: 6px; padding: 14px;display: inline-block;">
                                <img src="{{ asset('images/bag/6.png') }}" alt="#" style="width: 70px;height: 80px;">
                            </div>
                            <h1 style="color: red; opacity: 1;">B-</h1>
                        </div>
                        <h6>সক্রিয় ডোনারঃ  {{$this->EnglishToBangla($data['b_negative'] )}}</h6>
                        <h6>সর্বমোট ডোনারঃ  {{$this->EnglishToBangla($data['t_b_negative'] )}}</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-detail_box primary-color-br">
                        <div class="service-detail-icon">
                            {{-- <div class="service-detail-svg-block primary-color" style="background: red;">
                                <img src="{{ asset('images/icons/blood-transfusion.png') }}" alt="#">
                            </div> --}}
                            <div class="" style="border-radius: 6px; padding: 14px;display: inline-block;">
                                <img src="{{ asset('images/bag/7.png') }}" alt="#" style="width: 70px;height: 80px;">
                            </div>
                            <h1 style="color: red; opacity: 1;">O-</h1>
                        </div>
                        <h6>সক্রিয় ডোনারঃ  {{$this->EnglishToBangla($data['o_negative'] )}}</h6>
                        <h6>সর্বমোট ডোনারঃ  {{$this->EnglishToBangla($data['t_o_negative'] )}}</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-detail_box primary-color-br">
                        <div class="service-detail-icon">
                            {{-- <div class="service-detail-svg-block primary-color" style="background: red;">
                                <img src="{{ asset('images/icons/blood-transfusion.png') }}" alt="#">
                            </div> --}}
                            <div class="" style="border-radius: 6px; padding: 14px;display: inline-block;">
                                <img src="{{ asset('images/bag/8.png') }}" alt="#" style="width: 70px;height: 80px;">
                            </div>
                            <h1 style="color: red; opacity: 1;">AB-</h1>
                        </div>
                        <h6>সক্রিয় ডোনারঃ  {{$this->EnglishToBangla($data['ab_negative'] )}}</h6>
                        <h6>সর্বমোট ডোনারঃ  {{$this->EnglishToBangla($data['t_ab_negative'] )}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Detail -->


    <!--==================== Our Team ====================-->
    <section class="our-team">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub-title_center">
                        {{-- <span>---- Our Team ----</span> --}}
                        <h2>সাম্প্রতিক দাতা</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="doctors-slider">

                        @foreach($data['recent_donor'] as $row)
                        <div class="team-img_block yellow">
                            <div class="team-img-socila-block">
                                <img src="{{$row->pic_path}}" class="img-fluid" alt="#" style="object-fit: fill; width: 210px; height: 210px;"/>
                            </div>
                            <h4>{{$row->fname}}</h4>
                            <p>{{$row->blood_group}}</p>
                            <p>{{$row->district.', '. $row->upazila}}</p>

                            <ul class="nav-icon-wrap">
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.facebook.com/sharer/sharer.php?u=bsodbd.com&display=popup" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=&amp;p[title]=<?php echo $row->fname;?>&amp;p[summary]=<?php echo $row->blood_group;?>&amp;p[url]=<?php echo $row->pic_path;?>&amp;p[images][0]=<?php echo $row->pic_path;?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-facebook-f" style="font-size: 20px;"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo $row->pic_path.$row->blood_group; ?>+<?php echo "www.lifecycle.org";?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter" style="font-size: 20px;"></i></a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('viber://forward?text=<?php echo $row->pic_path.$row->blood_group; ?>+<?php echo "www.lifecycle.org";?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-viber" style="font-size: 20px;"></i></a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('https://api.whatsapp.com/send?text=http://lifecyclebd.org/<?php echo $row->pic_path.$row->blood_group; ?>+<?php echo "www.lifecycle.org";?>&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp" style="font-size: 20px;"></i></a>
                                </li>
                                
                            </ul>
                            
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Our Team -->

    <!--==================== News ====================-->

    @php
        $links = DB::table('videos')->select('link')->orderBy('id','desc')->first();
        $info = DB::table('system_settings')->select('*')->where('id', 1)->first();
    @endphp

    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="news-img-block">
                        {{-- <img src="images/play-img.png" class="img-fluid w-100" alt="#" />
                        <a class="video-play-button popup-youtube" href="{{ $links->link }}">
                            <span></span>
                        </a>
                        <div id="video-overlay" class="video-overlay">
                            <a class="video-overlay-close">&times;</a>
                        </div> --}}
                        <iframe width="100%" height="300px" src="@php
                        if($links->link){
                            echo $links->link;
                        }
                        @endphp" frameborder="0" allowfullscreen></iframe>

                        {{-- <p style="margin:5px;">ভিডিও গ্যালারি </p> --}}
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="video-play-text">
                        {{-- <span>Who we are -----</span> --}}
                        <h2>ভিডিও গ্যালারি</h2>
                        <p>
                            আমরা ২৪ ঘন্টায় আপনাদের সাথে, আপনাদের পাশে, আপনাদের কাজে নিয়োজিত ।
                        </p>
                        <h6>হটলাইন- {{$info->hot_line_phone}}</h6>
                        <h6>রক্তের জন্য- {{$info->blood_phone}}</h6>
                        <h6>ডাক্তার- {{$info->doctor_phone}}</h6>
                        <h6>এ্যাম্বুলেন্স- {{$info->ambulance_phone}}</h6>
                        <hr />
                        <a href="/donor_register" class="btn btn-success float-right">রক্তদাতা হন</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End News -->


    <!--==========================
          =  Modal window for আর্থিক অনুদান    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="donorModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="donorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="saveDonor()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">আর্থিক অনুদান</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <!--=====================================
                            MODAL BODY
                          ======================================-->
                          <div class="modal-body">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="d_name" placeholder="Name" required wire:model="d_name">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Profession:</strong>
                                        <input type="text" class="form-control" name="d_profession" placeholder="Profession" wire:model="d_profession">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Preferred volunteering location:</strong>
                                        <input type="text" class="form-control" name="d_p_location" placeholder="Preferred volunteering location" required="" wire:model="d_p_location">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Mobile Number:</strong>
                                        <input type="text" class="form-control" name="d_phone" placeholder="Mobile Number" required="" wire:model="d_phone">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Email:</strong>
                                        <input type="email" class="form-control" name="d_email" placeholder="Email" required="" wire:model="d_email">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Gender:</strong>
                                        <select class="form-control" name="d_gender" class="use-chosen" required wire:model="d_gender">
                                            <option value="">Select gender</option>
                                            <option value="Female">Female </option>
                                            <option value="Male">Male</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Facebook Url (If any):</strong>
                                        <input type="text" class="form-control" name="d_fb_link" placeholder="Facebook Url (If any)" wire:model="d_fb_link">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Viber Number (If any):</strong>
                                        <input type="text" class="form-control" name="d_viber_link" placeholder="Viber Number (If any)" wire:model="d_viber_link">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Imo Number (If any):</strong>
                                        <input type="text" class="form-control" name="d_imo_link" placeholder="Imo Number (If any)" wire:model="d_imo_link">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>WhatsApp Number (If any):</strong>
                                        <input type="text" class="form-control" name="d_whatsapp_link" placeholder="WhatsApp Number (If any)" wire:model="d_whatsapp_link">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Blood Group:</strong>
                                        <select name="d_blood_group" class="form-control" required wire:model="d_blood_group">
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+ (এ+) </option>
                                            <option value="AB+">AB+ (এবি+)</option>
                                            <option value="B+">B+ (বি+)</option>
                                            <option value="O+">O+ (ও+)</option>
                                            <option value="A-">A- (এ−)</option>
                                            <option value="AB-">AB- (এবি−)</option>
                                            <option value="B-">B- (বি−)</option>
                                            <option value="O-">O- (ও−)</option> 
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>How did you get to know about Lifecyclebd.org?:</strong>
                                        <select name="d_referance" class="form-control" required wire:model="d_referance">
                                            <option value="">Select</option>
                                            <option value="newspaper">Newspaper </option>
                                            <option value="website">Website</option>
                                            <option value="facebook">Facebook</option>
                                            <option value="friends">Friends</option>
                                            <option value="word of mouth">Word of mouth</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  


                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                          </div>
                    </form>
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



        <!--==========================
          =  Modal window for স্বেচ্ছাসেবী আহবান    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="volunteerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="volunteerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="saveVolunteer()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">স্বেচ্ছাসেবী আহবান</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <!--=====================================
                            MODAL BODY
                          ======================================-->
                          <div class="modal-body">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="name" placeholder="Name" required wire:model="name">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Profession:</strong>
                                        <input type="text" class="form-control" name="profession" placeholder="Profession" wire:model="profession">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Preferred volunteering location:</strong>
                                        <input type="text" class="form-control" name="p_location" placeholder="Preferred volunteering location" required="" wire:model="p_location">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Mobile Number:</strong>
                                        <input type="text" class="form-control" name="phone" placeholder="Mobile Number" required="" wire:model="phone">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Email:</strong>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="" wire:model="email">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Gender:</strong>
                                        <select class="form-control" name="gender" class="use-chosen" required wire:model="gender">
                                            <option value="">Select gender</option>
                                            <option value="Female">Female </option>
                                            <option value="Male">Male</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Facebook Url (If any):</strong>
                                        <input type="text" class="form-control" name="fb_link" placeholder="Facebook Url (If any)" wire:model="fb_link">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Viber Number (If any):</strong>
                                        <input type="text" class="form-control" name="viber_link" placeholder="Viber Number (If any)" wire:model="viber_link">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Imo Number (If any):</strong>
                                        <input type="text" class="form-control" name="imo_link" placeholder="Imo Number (If any)" wire:model="imo_link">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>WhatsApp Number (If any):</strong>
                                        <input type="text" class="form-control" name="whatsapp_link" placeholder="WhatsApp Number (If any)" wire:model="whatsapp_link">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Blood Group:</strong>
                                        <select name="blood_group" class="form-control" required wire:model="blood_group">
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+ (এ+) </option>
                                            <option value="AB+">AB+ (এবি+)</option>
                                            <option value="B+">B+ (বি+)</option>
                                            <option value="O+">O+ (ও+)</option>
                                            <option value="A-">A- (এ−)</option>
                                            <option value="AB-">AB- (এবি−)</option>
                                            <option value="B-">B- (বি−)</option>
                                            <option value="O-">O- (ও−)</option> 
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>How did you get to know about Lifecyclebd.org?:</strong>
                                        <select name="referance" class="form-control" required wire:model="referance">
                                            <option value="">Select</option>
                                            <option value="newspaper">Newspaper </option>
                                            <option value="website">Website</option>
                                            <option value="facebook">Facebook</option>
                                            <option value="friends">Friends</option>
                                            <option value="word of mouth">Word of mouth</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  


                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                          </div>
                    </form>
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


</div>
