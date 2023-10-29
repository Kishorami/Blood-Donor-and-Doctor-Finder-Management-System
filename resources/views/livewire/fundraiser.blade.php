<div>
    <!--==================== Login Form ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                {{-- <div class="col-md-6 text-center" style="margin: auto; color: red;">
                    <h4>{{ $reg_message }}</h4>
                </div> --}}
            </div>
            <br>
            <div class="row">
                
                <div class="col-md-7 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3 class="text-center">আর্থিক অনুদান</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="saveDonor()">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            

                            <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="d_name" placeholder="Name" required wire:model="d_name">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Profession:</strong>
                                        <input type="text" class="form-control" name="d_profession" placeholder="Profession" wire:model="d_profession">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Preferred volunteering location:</strong>
                                        <input type="text" class="form-control" name="d_p_location" placeholder="Preferred volunteering location" required="" wire:model="d_p_location">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Mobile Number:</strong>
                                        <input type="text" class="form-control" name="d_phone" placeholder="Mobile Number" required="" wire:model="d_phone">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Email:</strong>
                                        <input type="email" class="form-control" name="d_email" placeholder="Email" required="" wire:model="d_email">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Gender:</strong>
                                        <select class="form-control" name="d_gender" class="use-chosen" required wire:model="d_gender">
                                            <option value="">Select gender</option>
                                            <option value="Female">Female </option>
                                            <option value="Male">Male</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Facebook ID Link (If any):</strong>
                                        <input type="text" class="form-control" name="d_fb_link" placeholder="Facebook ID Link (If any)" wire:model="d_fb_link">
                                      </div>
                                    </div>
                                  </div>
                                  {{-- <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Viber Number (If any):</strong>
                                        <input type="text" class="form-control" name="d_viber_link" placeholder="Viber Number (If any)" wire:model="d_viber_link">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Imo Number (If any):</strong>
                                        <input type="text" class="form-control" name="d_imo_link" placeholder="Imo Number (If any)" wire:model="d_imo_link">
                                      </div>
                                    </div>
                                  </div> --}}
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>WhatsApp Number (If any):</strong>
                                        <input type="text" class="form-control" name="d_whatsapp_link" placeholder="WhatsApp Number (If any)" wire:model="d_whatsapp_link">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Blood Group:</strong>
                                        <select name="d_blood_group" class="form-control" required wire:model="d_blood_group">
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
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>How did you get to know about Lifecyclebd.org?:</strong>
                                        <select name="d_referance" class="form-control" required wire:model="d_referance">
                                            <option value="">Select</option>
                                            <option value="newspaper">Newspaper </option>
                                            <option value="website">Website</option>
                                            <option value="facebook">Facebook</option>
                                            <option value="friends">Friends</option>
                                            <option value="word of mouth">Word of mouth</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <h4 style="text-align: center; color: white;">I express interest to be a fundraiser of Lifecyclebd.org</h4>
                                      </div>
                                  </div>

                            <div class="row">
                                <div class="col-9" style="margin:auto;">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success float-right">Submit</button>
                                </div>
                            </div>
                            <div id="result" class="text-white"></div>
                        </form>

                    
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--//End Login Form -->

    {{-- @push('scripts')
        <script>
            function myFunction() {
              var x = document.getElementById("myInput");
              var y = document.getElementById("e_icon");

              y.classList.toggle("fa-eye-slash");

              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
        </script>
    @endpush --}}
    <style type="text/css">
        strong{
            color: white;
        }
    </style>

</div>
