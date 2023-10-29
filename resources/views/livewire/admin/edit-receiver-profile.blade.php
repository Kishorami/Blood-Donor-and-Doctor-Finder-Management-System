<div>
    <div class="wrapper">
        <div class="container">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Receiver Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <br>
              <p style="color: red; margin:auto;">*** Information of this form will effect Donor Information. Be careful while submitting this form.<br> Check All Information Is Correct Or Not. Some data is not recoverable(Like Donor last Donation Date).***</p>

              <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateReceiver()">
                @csrf
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Receiver Name</label>
                        <input type="text" class="form-control" placeholder="Receiver Name" required wire:model="receiver_name">
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Receiver Number</label>
                        <input type="text" class="form-control" placeholder="Receiver Number" required wire:model="receiver_phone">
                      </div>

                    </div>

                    <div class="row">
                         <div class="form-group col-sm-12">
                            <label for="exampleInputEmail1">Address</label>
                            <textarea  class="form-control" placeholder="Address" required wire:model="receiver_address"></textarea>
                          </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Gender</label>
                        <select class="form-control" name="receiver_gender" class="use-chosen" required wire:model="receiver_gender">
                            <option value="">Select gender</option>
                            <option value="Female">Female </option>
                            <option value="Male">Male</option>
                        </select>
                      </div>


                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Profession</label>
                        <input type="text" class="form-control" placeholder="Profession" required wire:model="receiver_profession">
                      </div>

                    </div>
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Hospital</label>
                        <input type="text" class="form-control" placeholder="Hospital" required  wire:model="receiver_hospital">
                      </div>

                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Donation Date</label>
                        <input type="date" class="form-control" placeholder="Donation Date" required  wire:model="receiver_donation_date">
                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Receiver Blood Group</label>
                        <select name="blood_group" class="form-control" required wire:model="receiver_blood_group">
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
                        <label for="exampleInputEmail1">Number Of Blood Bag</label>
                        <input type="number" class="form-control" placeholder="Number Of Blood Bag" required wire:model="blood_bag">
                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Donor ID</label>
                        <input type="number" class="form-control" placeholder="Donor ID" required wire:model.lazy="donor_id">
                        <p style="color:red;">To Check Donor Name and Phone No. Give Donor ID and click Outside of Input field.</p>
                      </div>

                      <div class="form-group col-sm-6">
                        {{-- <label for="exampleInputEmail1">Donor Name</label>
                        <input type="text" class="form-control" placeholder="Donor Name" required wire:model="donor_name"> --}}
                        <h3>Donor Name: {{ $temp_name }} <br> Donor Phone: {{ $temp_phone }}</h3>
                      </div>

                    </div>

                    {{-- <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Donor Phone</label>
                            <input type="text" class="form-control" placeholder="Donor Phone" required wire:model="donor_phone">
                          </div>

                          <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Donor Email</label>
                            <input type="email" class="form-control" placeholder="Donor Email" required wire:model="donor_email">
                          </div>

                    </div> --}}
                    <br>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-9" style="margin:auto;">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            @if(Session::has('error_message'))
                                <div class="alert alert-danger" role="alert">{{ Session::get('error_message') }}</div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success float-right">Update</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
