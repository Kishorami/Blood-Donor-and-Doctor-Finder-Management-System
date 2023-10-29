<div>
    <section class="space light">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub-title_center">
                        {{-- <span><i>---- Blog ----</i></span> --}}
                        <h2>রক্তদানের কিছু প্রয়োজনীয় কথা</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($data as $row)
                <div class="col-md-4">
                    <div class="blog-grid-wrap">
                        <div class="blog-grid-img">
                            <img src="{{ $row->pic_path }}" class="img-fluid" alt="#" style="object-fit: fill; width: 305px; height: 163px;">
                            {{-- <div class="blog-grid-date">
                                <h5>26</h5>
                                <p>May</p>
                            </div> --}}
                            {{-- <br><br> --}}
                            {{-- <h4>{{$row->title}}</h4> --}}
                            {{-- <a href="{{ route('blood_info.details',['id'=>$row->id]) }}" class="btn btn-primary">READ MORE</a> --}}

                        </div>
                        <div class="blog-grid_content">
                            <div class="blog-grid-top_icon">
                                <label><a href="{{ route('blood_info.details',['id'=>$row->id]) }}">READ MORE</a></label>
                                <p>প্রকাশের সময়কাল | {{ $row->created_at }}</p>
                                {{-- <p><i class="far fa-eye"></i>233 <span>|</span> <i class="far fa-comment"></i>233</p> --}}
                            </div>
                            <div class="blog-grid_text">
                                <a href="{{ route('blood_info.details',['id'=>$row->id]) }}">
                                    <h4>{{$row->title}}</h4>
                                </a>
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eius mod tempor </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-3" style="margin: auto;">
                    <div class="text-center mt-5">
                        {{-- <a href="#" class="btn btn-outline-primary">View All Blogs</a> --}}
                        {{ $data->links() }}
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
