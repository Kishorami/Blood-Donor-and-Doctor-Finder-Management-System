<div>
    <!--==================== Login Form ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                
                <div class="col-md-7 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3 class="text-center">Share Your Feelings</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="storeProudMessage()">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                       <strong style="color: white;">Donate Date:</strong>
                                        <input type="date" class="form-control" name="donate_date" placeholder="donate_date" wire:model="donate_date" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                       <strong style="color: white;">Place:</strong>
                                        <input type="text" class="form-control" name="donate_place" placeholder="Place" wire:model="donate_place" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div wire:ignore>
                                       <strong style="color: white;">Reason of Proud:</strong>
                                        <textarea maxlength="250" id="reason_of_proud" class="form-control" name="reason_of_proud" placeholder="Reason of Proud" rows="4" required wire:model="reason_of_proud"></textarea>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong style="color: white;">Blood Fighter Image</strong>
                                        <input type="file" class="input-file input-md" wire:model="image">
                                        <br>
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120">
                                        @endif
                                        {{-- <input class="form-control" type="text" name="profession" placeholder="Profession" wire:model="profession"> --}}
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
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
            $(document).ready(function() {
            $('#description').summernote({
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('description', contents);
                    }
                }
            });


          });
        </script>
    @endpush --}}

</div>
