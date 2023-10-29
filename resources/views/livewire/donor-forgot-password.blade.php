<div>
    <!--==================== Register Form ====================-->
    @if(empty($code_to_verify))
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
                        <h3 class="text-center">Password Reset</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="requestCode">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" placeholder="Email" wire:model="email" required>
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success float-right">Next</button>
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
    @else
        <section class="space">
            <div class="container container-custom">
                <div class="col-12" style="margin:auto;">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                </div>
                <div class="col-12" style="margin:auto;">
                    @if(Session::has('e-message'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('e-message') }}</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-7 text" style="margin: auto;">
                        <div class="get-in-touch get-in-touch-style2">
                            <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                            <h3 class="text-center">Password Reset</h3>
                            <form enctype="multipart/form-data" wire:submit.prevent="updatePassword">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="given_code" wire:model="given_code" required placeholder="Give Your Code">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="password" wire:model="password" required placeholder="Your new Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="password2" wire:model="password2" required placeholder="Re-type Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success float-right">Update</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
