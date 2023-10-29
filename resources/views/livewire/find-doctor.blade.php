<div>
    <!--==================== Our Doctors ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="col-md-12 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3 class="text-center">বিশেষজ্ঞ ডাক্তারের পরামর্শ পেতে আপনার নিকটবর্তী ডাক্তার খুঁজুন</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="findDoctor">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="doctor_speciality" required>
                                        <option value="">Select Specialiest</option>
                                        @foreach($data['doctor_specialities'] as $row)
                                            <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="division">
                                            <option value="">Select Division</option>
                                            @foreach($data['divisions'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->division_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="district">
                                            <option value="">Select District</option>
                                            @foreach($districts as $row)
                                                <option value="{{ $row->district_name }}">{{ $row->district_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="location">
                                            <option value="">Select Thana</option>
                                            @foreach($locations as $row)
                                                <option value="{{ $row->thana }}">{{ $row->thana }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div id="result" class="text-white"></div>
                        </form>
                    </div>
                </div>
                <br>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">আমাদের বিশেষজ্ঞ ডাক্তারগণ</h2>
                    {{-- <div class="sub-title_center">
                        <span>---- Our Team ----</span>
                        
                    </div> --}}
                </div>
            </div>
            
            <div class="row">

                @if(count($requested_doctors)<1 && $flag==1)
                    <h3 class="text-center" style="color: red; margin: auto;">আমরা দুঃখিত, আপনার কাঙ্ক্ষিত ডাক্তার কে খুঁজে পাওয়া যায়নি। <br> অনুগ্রহপূর্বক আবার খুঁজে দেখুন ।।</h3>
                @endif

                @foreach($requested_doctors as $row)
                <div class="col-md-3">
                    <div class="docrtors-box1">
                        {{-- <img src="{{$row->pic_path}}" class="img-fluid dotor-box1-img" alt="#"> --}}

                        @if(strpos($row->pic_path,"lifecyclebd.org"))
                            <img src="{{ $row->pic_path }}" class="img-fluid" alt="#">
                        @else
                            <img src="{{ asset($row->pic_path) }}" class="img-fluid" alt="#">
                        @endif

                        <h4>{{$row->name}}</h4>
                        <p>{{$row->designation}} </p>
                        <p>Hospital Name: {{$row->hospital}}  </p>
                        <p>Speciality : {{$row->specialist}} </p>
                        <p>Schedule: {{$row->schedule}} </p>
                        <p>Contact No: {{$row->phone}} </p>
                        
                        <div class="bg-shade"><img src="{{ asset('images/others/bg-shade.png') }}" class="img-fluid" alt="#"></div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    {{-- <!--==================== Find Doctor Form ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                
                <div class="col-md-12 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3 class="text-center">বিশেষজ্ঞ ডাক্তারের পরামর্শ পেতে আপনার নিকটবর্তী ডাক্তার খুঁজুন</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="findDoctor">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="doctor_speciality" required>
                                        <option value="">Select Specialiest</option>
                                        @foreach($data['doctor_specialities'] as $row)
                                            <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="division" required>
                                            <option value="">Select Division</option>
                                            @foreach($data['divisions'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->division_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="district" required>
                                            <option value="">Select District</option>
                                            @foreach($districts as $row)
                                                <option value="{{ $row->district_name }}">{{ $row->district_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="location" required>
                                            <option value="">Select Thana</option>
                                            @foreach($locations as $row)
                                                <option value="{{ $row->thana }}">{{ $row->thana }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right">Search</button>
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
    <!--//Find Doctor Form -->
 --}}
    


    <section class="space sub-header">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub-header_content">
                        {{-- <p>CONTACT US 2</p> --}}
                        <h3>২৪/৭ আমাদের বিশেষজ্ঞ ডাক্তারের পরামর্শ নিতে</h3>
                        <h3><a style="color: #FFD700;" href="{{ URL::to('/write_to_doctor') }}">এখানে ক্লিক করুন</a></h3>
                    </div>
                </div>
                <div style="border-left: 1px solid white;"></div>
                <div class="col-md-5">
                    <div class="sub-header_content">
                        {{-- <p>CONTACT US 2</p> --}}
                        <h3>সরাসরি কথা বলতে কল করুন</h3>
                        {{-- <h3 style="color: #FFD700;">০১৭০৮ ০১১৯৮৯</h3>
                        <h3 style="color: #FFD700;">০১৭১৬ ৪০৯৬৩৩ </h3> --}}
                        <h5 style="color: #FFD700;">
                            Doctor javed (Kafrul/Mirpur)- 01864-465237, 01864-465103.<hr>
                            Doctor Khalid Turjo (Uttara purbo/Pochim) 01927-537387, 01930675713.<hr>
                            Doctor Nabil (Gulshan/Basundhara-Rampura) 01915-625911, 01850-106390.<hr>
                            Doctor Mamunur Roshid (Hatirjheel/Mohammadpur) 01713-461404, 01930-675070.<hr>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>
