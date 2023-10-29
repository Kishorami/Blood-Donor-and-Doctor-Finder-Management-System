<div>
    <!--==================== Register Form ====================-->
    
    <section class="space">
        <div class="container container-custom">
            <div class="col-6" style="margin:auto;">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
            </div>
            <div class="row">
                
                <div class="col-md-7 text">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3 class="text-center">কোন রোগ কে অবহেলা করা উচিৎ নয়, আপনার সমস্যা আমাদের ডাক্তারদের সাথে শেয়ার করুন</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="storeFindSolution()">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name (নাম)" wire:model="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="age" placeholder="Age (বয়স)" wire:model="age" required>
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="blood_pressure" placeholder="Blood pressure (রক্তচাপ)" wire:model="blood_pressure">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="any_disease" placeholder="Any previous diseases? (পূর্বের কোনো রোগ?)" wire:model="any_disease" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" placeholder="Email (ই-মেইল)" wire:model="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="phone" placeholder="Phone (মোবাইল নাম্বার)" required wire:model="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="problems" placeholder="Write your problem (আপনার সমস্যা লিখুন)" wire:model="problems" required></textarea>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-6" style="margin:auto;">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success float-right">Submit</button>
                                </div>
                            </div>
                            <div id="result" class="text-white"></div>
                        </form>

                    </div>
                </div>

                {{-- <div class="col-md-4 text">
                    <div class="get-in-touch get-in-touch-style2">
                            <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                            <h3 class="text-center">আপনার নিকটস্থ বিশেষজ্ঞ ডাক্তার খুঁজে পেতে</h3>
                            <a  href="/find_doctor">এখানে ক্লিক করুন</a>
                            <hr>
                            <h3 class="text-center">সরাসরি কথা বলতে কল করুন ০১৭০৯৮৪৮৪৮২</h3>

                    </div>
                </div> --}}
                
                <div class="col-md-5 text">
                    <div class="get-in-touch get-in-touch-style2">
                        <div>
                            <div class="sub-header_content">
                                {{-- <p>CONTACT US 2</p> --}}
                                <h3 class="text-center">আপনার নিকটস্থ বিশেষজ্ঞ ডাক্তার খুঁজে পেতে</h3>
                                <h3 class="text-center"><a style="color: #FFD700;" href="{{ URL::to('/find_doctor') }}">এখানে ক্লিক করুন</a></h3>
                                <div class="sub-header_content">
                                <div style="border-bottom: 1px solid white; margin-bottom: 20px;"></div>
                                <h3 class="text-center">
                                    লাইফসাইকেল বিডির ফ্রী টেলিমেডিসিন সেবা পেতে ডাক্তারের নাম্বারে কল করুন:
                                </h3>
                                <h4 class="text-center">  
                                    Doctor javed (Kafrul/Mirpur)<br> 01864-465237, 01864-465103.
                                </h4>
                                <hr>
                                <h4 class="text-center"> 
                                    Doctor Khalid Turjo (Uttara purbo/Pochim)<br> 01927-537387, 01930-675713. 
                                </h4>
                                <hr>
                                <h4 class="text-center"> 
                                    Doctor Nabil (Hatirjheel/Basundhara-Rampura)<br> 01303-205301, 01850-106390.
                                </h4>
                                <hr>
                                <h4 class="text-center">  
                                    Doctor Zakaria (Gulshan/Mohammadpur)<br> 01915-625911, 01930-675070. 
                                </h4>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            

            </div>
        </div>
    </section>
    <!--//End Register Form -->
    
</div>
