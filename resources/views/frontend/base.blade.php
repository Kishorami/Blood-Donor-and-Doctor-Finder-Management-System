<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LifecycleBD</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('templates/css/bootstrap.min.css')}}">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('templates/css/all.css')}}">
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="{{asset('templates/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('templates/css/slick-theme.css')}}">
    <!-- Magnific popup CSS -->
    <link rel="stylesheet" href="{{asset('templates/css/magnific-popup.css')}}" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('templates/css/style.css')}}">



    @livewireStyles
</head>
<body>


    <section class="top-bar-block text-white" style="background: url({{ asset('templates/images/footer-bg.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-bar">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <a class="navbar-brand" href="/"><img src="{{ asset('images/logo/logoo.png') }}" alt="#" width="150px" height="60px"></a>
                            </div>
                            <div class="col-md-9 d-flex align-items-end">
                                <ul class="ml-auto">
                                    <li>
                                        <img src="{{ asset('templates/images/mail-icon.png') }}" alt="#">
                                        <div>
                                            <span>Email us</span>
                                            <h4>info@lifecyclebd.org</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{ asset('templates/images/call-icon.png') }}" alt="#">
                                        <div>
                                            <span>Call Us</span>
                                            <h4>01709848480-1, 01709848482-3, 01709848486-7</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End top bar -->
    <div class="light nav-big">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Nav menu -->
                     <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"  style="background-color: #f4f6fa;">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link" href="/" style="font-size: 1rem;">
                                        Home 
                                    </a>
                                </li>

                                @if(Session::has('did'))

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1rem;">
                                            Profile <i class="fas fa-plus"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/id_card" style="font-size: 1rem;">ID Card</a>
                                            <a class="dropdown-item" href="/donor_write_blog" style="font-size: 1rem;">Write Blog</a>
                                            <a class="dropdown-item" href="/donor_reason_of_proud" style="font-size: 1rem;">Share Feelings</a>
                                            <a class="dropdown-item" href="/donor_profile" style="font-size: 1rem;">Edit Profile</a>
                                            <a class="dropdown-item" href="/change_password" style="font-size: 1rem;">Change password</a>
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="/donor_register" style="font-size: 1rem;">
                                            Registration
                                        </a>
                                    </li>
                                @endif



                                @if(Session::has('did'))
                                    <li class="nav-item">
                                      <a class="nav-link" href="/donor_logout" style="font-size: 1rem;">Logout</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                      <a class="nav-link" href="/donor_login" style="font-size: 1rem;">Login</a>
                                    </li>
                                @endif

                                <li class="nav-item">
                                    <a class="nav-link" href="/request_blood" style="font-size: 1rem;">
                                        Blood Request 
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1rem;">
                                        Activity <i class="fas fa-plus"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/news" style="font-size: 1rem;">Health News</a>
                                        <a class="dropdown-item" href="/blog" style="font-size: 1rem;">Blog</a>
                                        <a class="dropdown-item" href="/blood_info" style="font-size: 1rem;">Blood Info</a>
                                        <a class="dropdown-item" href="/events" style="font-size: 1rem;">Events</a>
                                    </div>
                                </li>

                               {{--  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1rem;">
                                        Emergency Info  <i class="fas fa-plus"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/emergency_info" style="font-size: 1rem;">Ambulance</a>
                                        <a class="dropdown-item" href="/emergency_info#bloodBankSection" style="font-size: 1rem;">Blood Bank</a>
                                        <a class="dropdown-item" href="/emergency_info#socialOrganizationSection" style="font-size: 1rem;">Social Organization </a>
                                        <a class="dropdown-item" href="/emergency_info#graveyardSection" style="font-size: 1rem;">Graveyard</a>
                                        <a class="dropdown-item" href="/emergency_info#funeralbathZanajaSection" style="font-size: 1rem;">Funeral bath/Zanaja</a>
                                        <a class="dropdown-item" href="/emergency_info#theraphyCenterSection" style="font-size: 1rem;">Theraphy center </a>
                                    </div>
                                </li> --}}

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1rem;">
                                        Emergency Info  <i class="fas fa-plus"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('emergency_component',['id'=>1]) }}" style="font-size: 1rem;">Ambulance</a>
                                        <a class="dropdown-item" href="{{ route('emergency_component',['id'=>2]) }}" style="font-size: 1rem;">Blood Bank</a>
                                        <a class="dropdown-item" href="{{ route('emergency_component',['id'=>3]) }}" style="font-size: 1rem;">Social Organization </a>
                                        <a class="dropdown-item" href="{{ route('emergency_component',['id'=>4]) }}" style="font-size: 1rem;">Graveyard</a>
                                        <a class="dropdown-item" href="{{ route('emergency_component',['id'=>5]) }}" style="font-size: 1rem;">Funeral bath/Zanaja</a>
                                        <a class="dropdown-item" href="{{ route('emergency_component',['id'=>6]) }}" style="font-size: 1rem;">Theraphy center </a>
                                        <a class="dropdown-item" href="{{ route('emergency_number_component') }}" style="font-size: 1rem;">Emergency Numbers </a>
                                    </div>
                                </li>
                                

                                <li class="nav-item">
                                    <a class="nav-link" href="/find_doctor" style="font-size: 1rem;">
                                        Doctor 
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/find_hospital" style="font-size: 1rem;">
                                        Hospital 
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/faq_info" style="font-size: 1rem;">
                                        FAQ 
                                        {{-- রক্ত দানে জানা-আজানানা --}}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/aout_us" style="font-size: 1rem;">
                                        About Us 
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/contact_us" style="font-size: 1rem;">
                                        Contact Us 
                                    </a>
                                </li>
                                
                            </ul>
                            <ul class="nav-icon-wrap">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://lifecyclebd.org/&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('https://twitter.com/intent/tweet?text=http://lifecyclebd.org/&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter"></i></a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('viber://forward?text=http://lifecyclebd.org/&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-viber"></i></a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="#" target="popup" onclick="window.open('https://api.whatsapp.com/send?text=http://lifecyclebd.org/&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!--//End Nav menu -->
                </div>
            </div>
        </div>
    </div>
    



    @yield('content')





<!--==================== Footer ====================-->

    @php
        $office_info = DB::table('system_settings')->where('id',1)->first();
    @endphp
    <footer>
        <div class="container container-custom">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="foot-contact-block">
                        <img src="{{ asset('images/logo/logoo.png') }}" width="150px" height="60px" class="img-fluid" alt="#" />
                        <h3 style="color: white;"><span>হেড অফিস </span></h3>
                        <p>
                            {{ $office_info->head_office }}
                        </p>
                        <a href="tel:01709848480">
                            <h4><i class="fas fa-phone"></i>01709848480</h4>
                        </a>
                        <a href="mailto:info@lifecyclebd.org">
                            <h4><i class="far fa-envelope"></i>info@lifecyclebd.org</h4>
                        </a>
                        <a href="https://www.facebook.com/Lifecyclebd/"target="_blank">
                            <h4><i class="fab fa-facebook-f"></i></i>Like Our Facebook Page</h4>
                        </a>
                        <a href="https://www.facebook.com/groups/Lifecyclebd/?hc_ref=ARSOlBbWlVIHEeZFh5_myuZljkb615iS5kLaWhxowSosEQP2C0HTmDKIDy-r-KZdqgQ"target="_blank">
                            <h4><i class="fab fa-facebook-f"></i></i>Join Our Facebook Group</h4>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2 offset-lg-1">
                    <div class="foot-link-box">
                        <h4>সাইটের রুপরেখা</h4>
                        <ul>
                            <li>
                                <a href="/"><i class="fas fa-angle-double-right"></i>হোমপেজ </a>
                            </li>
                            <li>
                                <a href="/aout_us"><i class="fas fa-angle-double-right"></i>আমাদের কথা</a>
                            </li>
                            <li>
                                <a href="/donor_register"><i class="fas fa-angle-double-right"></i>দাতা হন</a>
                            </li>
                            <li>
                                <a href="/find_doctor"><i class="fas fa-angle-double-right"></i>ডাক্তার</a>
                            </li>
                            <li>
                                <a href="/find_hospital"><i class="fas fa-angle-double-right"></i>হাসপাতাল</a>
                            </li>
                            <li>
                                <a href="/ambulance_info"><i class="fas fa-angle-double-right"></i>এ্যাম্বুলেন্স</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="foot-link-box">
                        <h4>রক্ত দান</h4>
                        <ul>
                            <li>
                                <a href="#"><i class="fas fa-angle-double-right"></i>হটলাইন- {{$office_info->hot_line_phone}}</a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-angle-double-right"></i>রক্তের জন্য- {{$office_info->blood_phone}}</a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-angle-double-right"></i>আমাদের কথা-  {{$office_info->doctor_phone}}</a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-angle-double-right"></i>এ্যাম্বুলেন্স- {{$office_info->ambulance_phone}}</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2 offset-lg-1">
                    <div class="foot-link-box footlink-box_btn">
                        {{-- <a href="/find_doctor" class="btn btn-outline-success">Find a Doctor</a>
                        <a href="/find_hospital" class="btn btn-outline-success">Hospital</a>
                        <a href="/contact_us" class="btn btn-outline-success">Contact Us</a> --}}

                        <a href="#"> <h4>এ্যানড্রয়েড এ্যাপ ডাউনলোড করুন</h4>
                            <img style="width: 120px;height: 250px" class="img img-responsive img-rounded" src="http://lifecyclebd.org/public/images/googleplay_badge.png">
                        </a>


                        <ul class="nav-icon-wrap">
                            <li class="nav-item">
                                <a class="nav-link" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://lifecyclebd.org/&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" target="popup" onclick="window.open('https://twitter.com/intent/tweet?text=http://lifecyclebd.org/&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter"></i></a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#" target="popup" onclick="window.open('viber://forward?text=http://lifecyclebd.org/&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-viber"></i></a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="#" target="popup" onclick="window.open('https://api.whatsapp.com/send?text=http://lifecyclebd.org/&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>©<a href="https://kranech.com/" target="_blank">Kranech</a> 2021 Allright Reserved</p>
                        <a href="#" id="scroll"><i class="fas fa-angle-double-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--//End Footer -->








<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('templates/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('templates/js/popper.min.js')}}"></script>
<script src="{{asset('templates/js/bootstrap.min.js')}}"></script>
<!-- Slick Slider Js -->
<script src="{{asset('templates/js/slick.min.js')}}"></script>
<!-- Magnific popup Js -->
<script src="{{asset('templates/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Script Js -->
<script src="{{asset('templates/js/script.js')}}"></script>

@livewireScripts
</body>
</html>