<div>
    <div class="wrapper">
        <div class="container">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Volunteer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" wire:submit.prevent="storeVolunteer()">
                @csrf
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Name" required wire:model="name">
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Profession</label>
                        <input type="text" class="form-control" placeholder="Profession" required wire:model="profession">
                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Preferred volunteering location</label>
                        <input type="text" class="form-control" placeholder="Preferred volunteering location" required wire:model="p_location">
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Mobile Number</label>
                        <input type="text" class="form-control" placeholder="Mobile Number" required wire:model="phone">
                      </div>

                    </div>
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">email</label>
                        <input type="email" class="form-control" placeholder="email" required  wire:model="email">
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
                        <label for="exampleInputEmail1">Facebook Id Link  (If any)</label>
                        <input type="text" class="form-control" placeholder="Facebook Id Link (If any)"  wire:model="fb_link">
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">WhatsApp Number (If any)</label>
                        <input type="text" class="form-control" placeholder="WhatsApp Number (If any)" required wire:model="whatsapp_link">
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
                        <label for="exampleInputEmail1">Blood Group</label>
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

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">How did you get to know about Lifecyclebd.org?</label>
                        <select name="referance" class="form-control" wire:model="referance">
                            <option value="">Select</option>
                            <option value="newspaper">Newspaper </option>
                            <option value="website">Website</option>
                            <option value="facebook">Facebook</option>
                            <option value="friends">Friends</option>
                            <option value="word of mouth">Word of mouth</option>
                        </select>
                      </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Volunteer Status</label>
                        <select name="referance" class="form-control" wire:model="status" required>
                            <option value="">Select</option>
                            <option value="Volunteer">Volunteer </option>
                            <option value="Donor">Donor</option>
                        </select>
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
