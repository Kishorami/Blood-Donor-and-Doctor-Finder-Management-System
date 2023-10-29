<div>

    @push('metaTags')

        <meta name="description" content="News Details">

        <meta property="og:title" content="{{$data['read_more_detail']->title}}" />
        <meta property="og:url" content="https://lifecyclebd.org/news_details/{{ $news_id }}" />
        <meta property="og:description" content="{{$data['read_more_detail']->title}}">
        <meta property="og:image" content="{{$data['read_more_detail']->pic_path}}">
        {{-- <meta property="og:image" content="https://ia.media-imdb.com/images/rock.jpg" /> --}}
        <meta property="og:type" content="article" />
        <meta property="og:locale" content="en_GB" />
        <meta property="og:locale:alternate" content="fr_FR" />
        <meta property="og:locale:alternate" content="es_ES" />
    @endpush



    <!--==================== Blog List ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-8">
                    
                        <div class="blog-list blog-deatil">
                            @if(strpos($data['read_more_detail']->pic_path,"lifecyclebd.org"))
                                <img src="{{$data['read_more_detail']->pic_path}}" class="img-fluid" alt="#">
                            @else
                                <img src="https://lifecyclebd.org/{{$data['read_more_detail']->pic_path}}" class="img-fluid" alt="#">
                            @endif
                            {{-- <div class="blog-date">
                                <h3>05</h3>
                                <span>JUN</span>
                            </div> --}}
                            <div class="blog-text-wrap border-0 pl-0 pr-0">
                                <div class="blog-comment-top border-0">
                                    <p> প্রকাশের সময়কাল | </span> <i class="fa fa-clock"></i>{{$data['read_more_detail']->created_at}}</p>
                                </div>
                                <h2>{{$data['read_more_detail']->title}}</h2>
                                
                                <p>
                                    {!!$data['read_more_detail']->description!!}
                                 </p>
                                
                                <div class="tag-block">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <div class="tags">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <div class="share">
                                                <span style="font-size: 20px;">Share:</span>
                                                <ul>
                                                    @php
                                                        $url_to_share = URL::to('/').'/blood_info_details/'.$data['read_more_detail']->id;
                                                        // echo $url_to_share;
                                                        $url_to_share = 'http://lifecyclebd.org/read-more/detail/'.$data['read_more_detail']->id;
                                                        // echo $url_to_share;
                                                    @endphp
                                                    <li>
                                                        <a class="nav-link" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=lifecyclebd.org/news_details/{{$data['read_more_detail']->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-facebook-f" style="font-size: 20px;"></i></a>
                                                    </li>
                                                    <li>
                                                        {{-- <a href="#" target="popup" onclick="window.open('https://twitter.com/intent/tweet?text=lifecyclebd.org/news_details/{{$data['read_more_detail']->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter"></i></a> --}}

                                                        <a href="#" target="popup" onclick="window.open('https://twitter.com/share?text={{$data['read_more_detail']->title}}&url=https://lifecyclebd.org/news_details/{{$data['read_more_detail']->id}}&hashtags=#LIFECYCLEBD,#HealthAwareness,#Health&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter" style="font-size: 20px;"></i></a>

                                                    </li>
                                                    {{-- <li>
                                                        <a href="#" target="popup" onclick="window.open('viber://forward?text=lifecyclebd.org/news_details/{{$data['read_more_detail']->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-viber"></i></a>
                                                    </li> --}}
                                                    <li>
                                                        <a class="nav-link" href="#" target="popup" onclick="window.open('https://api.whatsapp.com/send/?phone&text=<?php urlencode("{{$data['read_more_detail']->title}}")?> https://lifecyclebd.org/news_details/{{$data['read_more_detail']->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp" style="font-size: 20px;"></i></a>

                                                        {{-- <a href="https://api.whatsapp.com/send/?phone&text=<?php urlencode('hi')?> https://lifecyclebd.org/news_details/{{$data['read_more_detail']->id}}"><i class="fab fa-whatsapp"></i></a> --}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                    
                </div>
                <div class="col-md-4">
                    
                    <div class="blog-sidebar">
                        <div class="blog-sidebar_heading">
                            <h4>আরও সংবাদ</h4>
                        </div>
                        <div class="blog-sidebar_wrap">

                            @foreach( $data['all_news'] as $row)
                                <div class="blog-sidebar_content">
                                    <a href="{{ route('news.details',['id'=>$row->id]) }}" class="thumbnail-wrap">
                                        {{-- <img src="{{$row->pic_path}}" alt="#"> --}}
                                        @if(strpos($row->pic_path,"lifecyclebd.org"))
                                            <img src="{{$row->pic_path}}" alt="#">
                                        @else
                                            <img src="https://lifecyclebd.org/{{$row->pic_path}}" alt="#">
                                        @endif
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

                            {{ $data['all_news']->links() }}

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
