<div>
    <!--==================== Register Form ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="col-12" style="margin:auto;">
                @if(Session::has('e-message'))
                    <div class="alert alert-danger" role="alert">{{ Session::get('e-message') }}</div>
                @endif
            </div>
            <div class="col-12" style="margin:auto;">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
            </div>
            <div class="row">
                
                <div class="col-md-7 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3 class="text-center">Change Password</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="updatePassword">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" wire:ignore>
                                        <input id="myInput" class="form-control" type="password" name="old_password" placeholder="Present Password" wire:model="old_password" required>
                                        <i id="e_icon" onclick="myFunction()" class="fas fa-eye" wire:ignore></i>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" wire:ignore>
                                        <input id="myInput2" class="form-control" type="password" name="password" placeholder="New Password" wire:model="password" required>
                                        <i id="e_icon2" onclick="myFunction2()" class="fas fa-eye" wire:ignore></i>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" wire:ignore>
                                        <input id="myInput3" class="form-control" type="password" name="password" placeholder="Re-type Password" wire:model="password2" required>
                                        <i id="e_icon3" onclick="myFunction3()" class="fas fa-eye" wire:ignore></i>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
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

        function myFunction2() {
          var x = document.getElementById("myInput2");
          var y = document.getElementById("e_icon2");

          y.classList.toggle("fa-eye-slash");

          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }

        function myFunction3() {
          var x = document.getElementById("myInput3");
          var y = document.getElementById("e_icon3");

          y.classList.toggle("fa-eye-slash");

          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }

    </script>

   
</div>
