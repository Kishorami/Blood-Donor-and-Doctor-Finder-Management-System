<div>
    <!--==================== Login Form ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                
                <div class="col-md-9 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        <h3 class="text-center" style="color:white;">Write Blog</h3>
                        <form enctype="multipart/form-data" wire:submit.prevent="storeBlog()">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                       <strong style="color: white;">Title:</strong>
                                        <input type="text" class="form-control" name="title" placeholder="Title" wire:model="blog_title" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div wire:ignore>
                                       <strong style="color: white;">Description:</strong>
                                        <textarea id="description" class="form-control" name="description" placeholder="Description" rows="10" required wire:model="description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong style="color: white;">Featured Image</strong>
                                        <input type="file" class="input-file input-md" wire:model="image">
                                        <br>
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120">
                                        @endif
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



    @push('scripts')
        <script>
            $(document).ready(function() {
            $('#description').summernote({
                height: 200,
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('description', contents);
                    }
                }
            });


          });
        </script>
    @endpush

    <style type="text/css">
        .get-in-touch h3{
            color: black;
        }
    </style>


</div>
