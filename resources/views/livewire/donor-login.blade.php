<div>
    <!--==================== Login Form ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-12" style="margin:auto;">
                    @if(Session::has('message'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('message') }}</div>
                    @endif
                </div>
                <div class="col-md-6 text-center" style="margin: auto; color: red;">
                    <h4>{{ $reg_message }}</h4>
                </div>
            </div>
            <br>
            <div class="row">
                
                <div class="col-md-7 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3 class="text-center">Donor Login</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="loginDonor">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email/Phone" wire:model="email" required>
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="myInput" type="password" class="form-control" name="password" placeholder="Password" wire:model="password" required  wire:ignore>
                                        <i id="e_icon" onclick="myFunction()" class="fas fa-eye"></i>
                                        {{-- <input type="checkbox" onclick="myFunction()">Show Password --}}

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success float-right">Login</button>
                                </div>
                            </div>
                            <div id="result" class="text-white"></div>
                        </form>

                    <div class="row">
                        <div class="col-md-4">
                            <a href="/donor_register" class="text-white"><i class=" fas fa-user-plus"></i> Register Here</a>
                        </div>
                        <div class="col-md-6">
                            <a href="forgot_password" class="text-white"><i class=" fas fa-lock"></i> Forgot your password?
                            </a>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--//End Login Form -->

    {{-- @push('scripts') --}}
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
    {{-- @endpush --}}

</div>
