<div>
    

    <!--==================== Find Hospital Form ====================-->
    <section>
        <div class="container container-custom">
            <div class="col-md-12 text" style="margin: auto;">
                    <div class="get-in-touch get-in-touch-style2">
                        <img src="{{asset('images/others/contact-form-bg.png')}}" class="img-fluid get-in-bg" alt="#">
                        {{-- <h3 class="text-center">দ্রুত সেবা পেতে আপনার নিকটবর্তী {{ $info_name }} খুঁজুন</h3> --}}
                        <h4 class="text-white">{!! $info_message !!}</h4>
                        <form enctype="multipart/form-data" wire:submit.prevent="findInformation">
                            @csrf
                            <!-- REQUIRED: Your Access key here. Don't worry this can be public -->
                            <!-- Create your Access key here: https://web3forms.com/ -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="division" required>
                                            <option value="">Select Division</option>
                                            @foreach($data['divisions'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->division_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="district">
                                            <option value="">Select District</option>
                                            @foreach($districts as $row)
                                                <option value="{{ $row->district_name }}">{{ $row->district_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="post-per-page" class="custom-select form-control" wire:model="location">
                                        <option value="">Select Thana</option>
                                        @foreach($locations as $row)
                                            <option value="{{ $row->thana }}">{{ $row->thana }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div id="result" class="text-white"></div>
                        </form>
                    </div>
                </div>

                <br>
                <div class="col-md-4">
                    <h3>{{ $info_name }}</h3>
                    </div>

            <div class="row">

                    
                <div class="col-md-12">
                    <div class="blog-wrap">

                        @if(count($requested_info)<1 && $flag==1)
                            <h3 class="text-center" style="color: red; margin: auto;">আমরা দুঃখিত, আপনার কাঙ্ক্ষিত এলাকাতে  {{ $info_name }} খুঁজে পাওয়া যায়নি।</h3>
                        @endif

                        @foreach($requested_info as $row)
                        <div class="blog-row-block">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="blog-img">
                                        {{-- <img src="{{$row->photo}}" class="img-fluid" alt="#" /> --}}

                                        @if(strpos($row->photo,"lifecyclebd.org"))
                                            <img src="{{ $row->photo }}" class="img-fluid" alt="#">
                                        @else
                                            <img src="{{ asset($row->photo) }}" class="img-fluid" alt="#">
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <div class="blog-content">
                                        <span>Name</span>
                                        <h6>
                                            {{$row->name}}
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-center">
                                    <div class="blog-content">
                                        <span>Address</span>
                                        <p>
                                            {{$row->location}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <div class="blog-content">
                                        <span>Phone</span>
                                        <p>
                                            {{$row->phone}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-center">
                                    <div class="blog-content">
                                        <span>Details</span>
                                        <p>
                                            {{$row->details}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        {{-- @if($requested_hospital instanceof \Illuminate\Pagination\LengthAwarePaginator )

                        {{ $requested_hospital->links() }}

                        @endif --}}

                        
                    </div>
                </div>

                <br>
                <br>
                
            </div>
        </div>
    </section>
    <!--//Find Hospital Form -->


    

</div>
