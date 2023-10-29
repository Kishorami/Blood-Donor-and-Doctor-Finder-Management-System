<div>
    @php
        $office_info = DB::table('system_settings')->where('id',1)->first();
    @endphp
    <!--==================== Contact Us ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="col-6" style="margin:auto;">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="contact-box">
                        {{-- <p>Lorem ipsum dolor sit amet consect etur adipi sicing elit, sed do eiusm</p>
                        <hr> --}}
                        <div class="contact-title">
                            <h4>Contact Information</h4>
                            <i class="fas fa-phone-volume"></i>
                            <div class="contact-title_icon">
                                <p>Phone</p>
                                {{-- <h6>{{$office_info->hot_line_phone}}</h6> --}}
                                <h6>01709848480,<br> 01709848481,<br> 01709848482,<br> 01709848483,<br> 01709848486,<br> 01709848487</h6>
                            </div>
                        </div>
                        <div class="contact-title">
                            <i class="fas fa-envelope"></i>
                            <div class="contact-title_icon">
                                <p>Email</p>
                                <h6>{{$office_info->email1}}</h6>
                                <h6>{{$office_info->email2}}</h6>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="contact-box">
                        <div class="contact-title">
                            <h4>Head Office</h4>
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="contact-title_icon">
                                <p>Address</p>
                                <h6>ইউনাইটেড ন্যাশনস রোড, <br>
                                    গুলশান সার্কেল-২, <br>
                                    ঢাকা-১২১২</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3>Get in Touch with Us</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="sendMessage">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Your Name" wire:model="name" required>
                                        <i class="far fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email" wire:model="email" required>
                                        <i class="far fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" wire:model="phone" required>
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group textarea-icon">
                                        <textarea class="form-control" name="message" placeholder="Your Message" wire:model="message" required></textarea>
                                        <i class="far fa-envelope"></i>
                                        <button type="submit" class="btn btn-success float-right">Send Message</button>
                                    </div>
                                </div>
                            </div>
                            <div id="result" class="text-white"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//End Contact Us -->


    <section class="space sub-header">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-3">
                    <div class="sub-header_content">
                        
                        <h3>অ্যাম্বুলেন্স এর জন্য</h3>
                        <h3 style="color: #FFD700;">01308 656289,<br> 01323 899001-3</h3>
                    </div>
                </div>
                <div style="border-left: 1px solid white;"></div>
                <div class="col-md-3">
                    <div class="sub-header_content">
                        
                        <h3>রক্তের প্রয়োজনে </h3>
                        <h3 style="color: #FFD700;">০১৭০৯ ৮৪৮৪৮০-৩ </h3>
                        <h3 style="color: #FFD700;">০১৭০৯ ৮৪৮৪৮৬-৭  </h3>
                    </div>
                </div>
                <div style="border-left: 1px solid white;"></div>
                <div class="col-md-5">
                    <div class="sub-header_content">
                        
                        <h3>ডাক্তার এর সাথে সরাসরি কথা বলতে</h3>
                        <h4 style="color: #FFD700;">Doctor javed (Kafrul/Mirpur)<br> 01864-465237, 01864-465103.</h4>
                        <h4 style="color: #FFD700;">Doctor Khalid Turjo (Uttara purbo/Pochim)<br> 01927-537387, 01930-675713</h4>
                        <h4 style="color: #FFD700;">Doctor Nabil (Hatirjheel/Basundhara-Rampura)<br> 01303-205301, 01850-106390</h4>
                        <h4 style="color: #FFD700;">Doctor Zakaria (Gulshan/Mohammadpur)<br> 01915-625911, 01930-675070</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
