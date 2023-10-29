<div>
    < <section class="space">
        <div class="container container-custom">
            <div class="row">
                
                <div class="col-md-12 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3 class="text-center">Your Profile</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="updateProfile()">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select style="height: 50px;" name="blood_group" class="form-control" wire:model="blood_group" required>
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
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" wire:model="phone" required>
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="f_name" placeholder="First Name" wire:model="f_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="l_name" placeholder="Last Name" wire:model="l_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" placeholder="Email" wire:model="email" required>
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select style="height: 50px;" class="form-control" name="gender" class="use-chosen" wire:model="gender" required>
                                            <option value="">Select gender</option>
                                            <option value="Female">Female </option>
                                            <option value="Male">Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="birth_date" placeholder="Date of Birth" wire:model="birth_date">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" wire:ignore>
                                        <select style="height: 50px;" class="form-control" name="post-per-page" class="use-chosen" wire:model="division" required>
                                            <option value="">Select Division</option>
                                            @foreach($data['divisions'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->division_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" wire:ignore>
                                        <select style="height: 50px;" class="form-control" name="post-per-page" class="use-chosen" wire:model="district" required>
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
                                        <select style="height: 50px;" class="form-control" name="post-per-page" class="use-chosen" wire:model="location" required>
                                            <option value="">Select Thana</option>
                                            @foreach($locations as $row)
                                                <option value="{{ $row->thana }}">{{ $row->thana }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="post_code" placeholder="Post Code" wire:model="post_code">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
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
                                        <input class="form-control" type="text" name="profession" placeholder="Profession" wire:model="profession">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="reference" placeholder="Reference" wire:model="reference">
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
                                        @else
                                           <img src="{{ $old_image }}" width="120">
 
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
                                    <a href="/change_password" class="btn btn-success float-right">Change Password</a>
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
    </section>
    <!--//End Register Form -->

</div>
