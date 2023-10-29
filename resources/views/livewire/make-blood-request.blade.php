<div>
    <!--==================== Make Blood Request Form ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="col-6" style="margin:auto;">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
            </div>
            <div class="row">
                
                <div class="col-md-12 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3 class="text-center"> আপনার প্রয়োজনটা আমরা বুঝতে পারছি। তাই, সহজে রক্তদাতা পেতে বিস্তারিত ও সুনির্দিষ্ট তথ্য দিয়ে পোস্ট করুন, প্লিজ</h3>
                        <h3 class="text-center">Send a blood request</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="storeBloodRequest">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color:white;">Blood Group (রক্তের গ্রুপ)</label>
                                        <select name="blood_group" class="custom-select form-control" wire:model="blood_group" required>
                                            <option value="">Select Blood Group (রক্তের গ্রুপ)</option>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color:white;">Blood Bag (ব্লাড ব্যাগ এর পরিমাণ উল্লেখ  করুন)</label>
                                        <input class="form-control" type="number" name="phone" placeholder="Blood Bag (ব্লাড ব্যাগ এর পরিমাণ উল্লেখ  করুন)" wire:model="no_of_blood_bag" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label style="color:white;">Patient/Relative Name/Contact Person (রুগীর নাম লিখুন)</label>
                                        <input class="form-control" type="text" name="patient_name" placeholder="Patient/Relative Name/Contact Person (রুগীর নাম লিখুন)" required wire:model="patient_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color:white;">Patient/Relative Phone/Contact Number (যোগাযোগ ফোন নাম্বার)</label>
                                        <input class="form-control" type="text" name="patient_phone" placeholder="Patient/Relative Phone/Contact Number (যোগাযোগ ফোন নাম্বার)" required wire:model="patient_phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="color:white;">Reason/Disease (কারণ উল্লেখ করুন / রোগীর সমস্যা )</label>
                                        <input class="form-control" type="text" name="disease" placeholder="Reason/Disease (কারণ উল্লেখ করুন / রোগীর সমস্যা )" required wire:model="disease">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="relation" placeholder="Relation (রুগীর সাথে সম্পর্ক)" required wire:model="relation">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="patient_hospital" placeholder="Hospital Name (হাসপাতালের নাম)" required wire:model="patient_hospital">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color:white;">Hospital / Location (হাসপাতালের ঠিকানা)</label>
                                        <input class="form-control" type="text" name="patient_place" placeholder="Hospital / Location (হাসপাতালের ঠিকানা/রক্ত দানের স্থান )" required wire:model="patient_place">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color:white;">Time of Need (রক্ত দানের সময় এবং তারিখ )</label>
                                        <input class="form-control" type="datetime-local" name="time_of_need" placeholder="Time of need (রক্ত দানের সময় এবং তারিখ )" required wire:model="time_of_need">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" placeholder="Write your message (আপনার মেসেজ লিখুন)" wire:model="message"></textarea> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="margin:auto;">
                                    <div class="form-group">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right">Request</button>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div>
                                <h3>বিস্তারিত তথ্য দিয়ে রিকোয়েস্ট দিলে রক্ত দাতা খুঁজে পেতে সহজ হয়, এতে সহজে ব্লাড ম্যানেজ হয় । রোগীর সুস্থতা কামনা করছি । </h3>
                            </div>

                            <div id="result" class="text-white"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//Make Blood Request Form -->

</div>
