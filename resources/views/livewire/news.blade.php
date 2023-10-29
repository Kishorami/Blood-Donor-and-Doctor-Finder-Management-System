<div>
    <!--==================== Blog List ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-8">
                    
                        <div class="blog-list blog-deatil">
                            {{-- <img src="images/blog-img.jpg" class="img-fluid" alt="#"> --}}
                            {{-- <div class="blog-date">
                                <h3>05</h3>
                                <span>JUN</span>
                            </div> --}}
                            <div class="blog-text-wrap border-0 pl-0 pr-0">
                                <h2>{{$data['last_news']->title}}</h2>
                                <div class="blog-comment-top border-0">
                                    <p>প্রকাশের সময়কাল - </span> <i class="fa fa-clock"></i>{{ $data['last_news']->created_at }} | নিউজ লিখেছেন - {{ $data['last_news']->name }}</p>
                                </div>
                                <img src="{{asset($data['last_news']->pic_path)}}" class="img-fluid" alt="#" style="object-fit: fill; width: 500px; height: 400px;">
                                <p>
                                    {!! substr($data['last_news']->description, 0, 1000) !!} 
                                </p>
                                <a href="{{ route('news.details',['id'=>$data['last_news']->id]) }}" class="btn btn-primary float-right">বিস্তারিত</a>
                            </div>
                        </div>
                        
                       

                        <!--==================== Blog grid ====================-->
                        <section class="space light">
                            <div class="container container-custom">
                                
                                <div class="row">
                                    @foreach($data['recent_news'] as $row)
                                        <div class="col-md-6">
                                            <div class="blog-grid-wrap">
                                                
                                                <div class="blog-grid_content">
                                                    <div class="blog-grid_text">
                                                        <a href="{{ route('news.details',['id'=>$row->id]) }}">
                                                            <h4>{{$row->title}}</h4>
                                                        </a>
                                                        <div class="blog-comment-top border-0">
                                                            <p>প্রকাশের সময়কাল - </span> <i class="fa fa-clock"></i>{{ $row->created_at }} | নিউজ লিখেছেন - {{ $row->name }}</p>
                                                        </div>
                                                        <div class="blog-grid-img">
                                                            <img src="{{$row->pic_path}}" class="img-fluid" alt="#">
                                                        </div>
                                                        <p>{!! substr($row->description, 0, 500) !!} </p>
                                                        <a href="{{ route('news.details',['id'=>$row->id]) }}" class="btn btn-outline-primary float-right">বিস্তারিত</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <!--//End Blog Grid -->

                    
                </div>
                <div class="col-md-4">
                    
                    <div class="blog-sidebar">
                        <div class="blog-sidebar_heading">
                            <h4>আরও সংবাদ</h4>
                        </div>
                        <div class="blog-sidebar_wrap">
                            @livewire('more-news')
                            {{-- @foreach( $data['all_news'] as $row)
                                <div class="blog-sidebar_content">
                                    <a href="{{ route('news.details',['id'=>$row->id]) }}" class="thumbnail-wrap">
                                        <img src="{{$row->pic_path}}" alt="#">
                                        <div class="thumbnail-hover">
                                            <i class="fas fa-external-link-alt"></i>
                                        </div>
                                    </a>
                                    <div class="thumbnail-text_wrap">
                                        <p>{{$row->title}}
                                        </p>
                                        <span>{{ $row->created_at }}</span>
                                    </div>
                                </div>
                            @endforeach

                            {{ $data['all_news']->links() }} --}}

                        </div>
                    </div>

                    <div class="blog-sidebar">
                        <div class="blog-sidebar_heading">
                            <h4>গুরুত্বপূর্ণ লিংক</h4>
                        </div>
                        <div class="blog-sidebar_wrap">
                            <ul class="blog-sidebar_tags">
                                <li><a href="#">ব্লগ</a></li>
                                <li><a href="#">ইভেন্ট সমূহ</a></li>
                                <li><a href="/blood_info">রক্তদানের কিছু প্রয়োজনীয় কথা</a></li>
                                <li><a href="/news">স্বাস্থ্য সংবাদ</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
    <!--//End Blog List -->
</div>
