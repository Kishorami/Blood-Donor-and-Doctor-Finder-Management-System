<div>
    <div class="wrapper">
        <div class="container">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Donor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" wire:submit.prevent="storeDonor()">
                @csrf
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Blood Group</label>
                        {{-- <input type="text" class="form-control" placeholder="Name" required wire:model="name"> --}}
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

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" required wire:model="phone">
                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control" placeholder="Full Name" required wire:model="f_name">
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" placeholder="Email" required wire:model="email">
                      </div>

                    </div>
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Birth Date</label>
                        <input type="date" class="form-control" placeholder="birth_date" required  wire:model="birth_date">
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Gender</label>
                        <select class="form-control" name="gender" class="use-chosen" required wire:model="gender">
                            <option value="">Select gender</option>
                            <option value="Female">Female </option>
                            <option value="Male">Male</option>
                        </select>
                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Division</label>
                        <select class="form-control" name="post-per-page" class="use-chosen" wire:model="division" required>
                            <option value="">Select Division</option>
                            @foreach($data['divisions'] as $row)
                                <option value="{{ $row->id }}">{{ $row->division_name }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">District</label>
                        <select class="form-control" name="post-per-page" class="use-chosen" wire:model="district" required>
                            <option value="">Select District</option>
                            @foreach($districts as $row)
                                <option value="{{ $row->district_name }}">{{ $row->district_name }}</option>
                            @endforeach
                        </select>
                      </div>
                      {{-- <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Viber Number (If any)</label>
                        <input type="text" class="form-control" placeholder="Viber Number (If any)"  wire:model="viber_link">
                      </div> --}}

                    </div>

                    {{-- <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Imo Number (If any)</label>
                        <input type="text" class="form-control" placeholder="Imo Number (If any)" required  wire:model="imo_link">
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">WhatsApp Number (If any)</label>
                        <input type="text" class="form-control" placeholder="WhatsApp Number (If any)" required wire:model="whatsapp_link">
                      </div>

                    </div> --}}

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Thana</label>
                        <select class="form-control" name="post-per-page" class="use-chosen" wire:model="location" required>
                            <option value="">Select Thana</option>
                            @foreach($locations as $row)
                                <option value="{{ $row->thana }}">{{ $row->thana }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Post Code</label>
                        <input class="form-control" type="text" name="post_code" placeholder="Post Code" wire:model="post_code">
                      </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Password</label>
                            <input class="form-control" type="text" name="password" placeholder="Password" wire:model="password">
                        </div>

                        <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea class="form-control" name="address" placeholder="Full Address" wire:model="address" required></textarea>
                      </div>

                    </div>

                    

                    <br>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-9" style="margin:auto;">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
