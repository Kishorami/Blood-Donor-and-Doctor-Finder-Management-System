<div>
    <!--==================== Blog ====================-->
    <section class="space">
        <div class="container container-custom">
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="sub-title_center">
                        <span><i>---- Blog ----</i></span>
                        <h2>রক্তদানের কিছু প্রয়োজনীয় কথা</h2>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-wrap">

                        @foreach($data as $row)
                            <div class="blog-row-block">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="blog-img">
                                            <img src="{{ $row->pic_path }}" class="img-fluid" alt="{{ asset('$row->pic_path') }}" />
                                            {{-- <img src="{{ asset('$row->pic_path') }}" class="img-fluid" alt="#" /> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="blog-content">
                                            <span>প্রকাশের সময়কাল | {{ $row->created_at }}</span>
                                            <h3>
                                                {{$row->title}}
                                            </h3>
                                            {{-- <p>
                                                {!!mb_substr($row->description,0,500)!!}
                                            </p> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex align-items-center">
                                        <div class="blog-read-more">
                                            {{-- <p>
                                                <i class="far fa-eye"></i>233 <span>|</span>
                                                <i class="far fa-comment"></i>33
                                            </p> --}}
                                            <a href="{{ route('blog.details',['id'=>$row->id]) }}" class="btn btn-primary">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
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
    <!--//End Blog -->
</div>
