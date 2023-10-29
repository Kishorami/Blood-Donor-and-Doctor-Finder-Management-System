<div>
     <section class="space">
        <div class="container">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Donor Profile</h3>
                </div>

                <br>
            <div class="card-body">
            <div class="row">
                
                <div class="col-md-12 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        {{-- <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#"> --}}
                        {{-- <h3 class="text-center">Donor Profile</h3> --}}
                        <form enctype="multipart/form-data" wire:submit.prevent="updateProfile()">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Blood Group</strong>
                                        <select name="blood_group" class="form-control" wire:model="blood_group" required>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Phone</strong>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" wire:model="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>First Name</strong>
                                        <input class="form-control" type="text" name="f_name" placeholder="First Name" wire:model="f_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Lastname</strong>
                                        <input class="form-control" type="text" name="l_name" placeholder="Last Name" wire:model="l_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Email</strong>
                                        <input class="form-control" type="email" name="email" placeholder="Email" wire:model="email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Gender</strong>
                                        <select class="form-control" name="gender" class="use-chosen" wire:model="gender" required>
                                            <option value="">Select gender</option>
                                            <option value="Female">Female </option>
                                            <option value="Male">Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Birth date</strong>
                                        <input class="form-control" type="date" name="birth_date" placeholder="Date of Birth" wire:model="birth_date">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" wire:ignore>
                                        <strong>Division</strong>
                                        <select class="form-control" name="post-per-page" class="use-chosen" wire:model="division" required>
                                            <option value="">Select Division</option>
                                            @foreach($data['divisions'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->division_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" wire:ignore>
                                        <strong>District</strong>
                                        <select class="form-control" name="post-per-page" class="use-chosen" wire:model="district" required>
                                            <option value="">Select District</option>
                                            @foreach($districts as $row)
                                                <option value="{{ $row->district_name }}">{{ $row->district_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Thana</strong>
                                        <select class="form-control" name="post-per-page" class="use-chosen" wire:model="location" required>
                                            <option value="">Select Thana</option>
                                            @foreach($locations as $row)
                                                <option value="{{ $row->thana }}">{{ $row->thana }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Post Code</strong>
                                        <input class="form-control" type="text" name="post_code" placeholder="Post Code" wire:model="post_code">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Address</strong>
                                        <textarea class="form-control" name="address" placeholder="Full Address" wire:model="address" required></textarea>
                                    </div>
                                </div>
                                
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" placeholder="Password" wire:model="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" wire:model="confirm_password" required="">
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Profession</strong>
                                        <input class="form-control" type="text" name="profession" placeholder="Profession" wire:model="profession">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Reference</strong>
                                        <input class="form-control" type="text" name="reference" placeholder="Reference" wire:model="reference">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Last Donation Date</strong>
                                        <input class="form-control" type="date" name="last_donation" placeholder="Last donation" wire:model="last_donation">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h3>Image</h3>
                                        <input type="file" class="input-file input-md" wire:model="image">
                                        <br>
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120">
                                            {{-- <img src="{{ asset($image->temporaryUrl()) }}" width="120"> --}}
                                        @else
                                           <img src="{{ asset($old_image) }}" width="120">
 
                                        @endif
                                        {{-- <input class="form-control" type="text" name="profession" placeholder="Profession" wire:model="profession"> --}}
                                    </div>
                                </div>
                                
                            </div>


                            <div class="row">
                                <div class="col-md-6" style="margin:auto;">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                </div>
                                
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success float-right">Update</button>
                                </div>
                            </div>
                            <div id="result" class="text-white"></div>
                        </form>

                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </section>
    <!--//End Register Form -->

</div>
