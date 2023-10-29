<div>


    @push('metaTags')

        <meta name="description" content="News Details">

        <meta property="og:title" content="{{$data['read_more_detail']->title}}" />
        <meta property="og:url" content="https://lifecyclebd.org/blog_details/{{ $blog_id }}" />
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
                    <form action="#">
                        <div class="blog-list blog-deatil">
                            {{-- <img src="{{ $image }}" class="img-fluid" alt="#"> --}}

                            @if(strpos($image,"lifecyclebd.org"))
                                <img src="{{ $image }}" class="img-fluid" alt="#">
                            @else
                                <img src="https://lifecyclebd.org/{{ $image }}" class="img-fluid" alt="#">
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
                                                        <a class="nav-link" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://lifecyclebd.org/blog_details/{{$data['read_more_detail']->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-facebook-f" style="font-size: 20px;"></i></a>
                                                    </li>
                                                    <li>
                                                        {{-- <a href="#" target="popup" onclick="window.open('https://twitter.com/intent/tweet?text=http://lifecyclebd.org/blog_details/{{$data['read_more_detail']->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter"></i></a> --}}

                                                        <a href="#" target="popup" onclick="window.open('https://twitter.com/share?text={{$data['read_more_detail']->title}}&url=https://lifecyclebd.org/blog_details/{{$data['read_more_detail']->id}}&hashtags=#LIFECYCLEBD,#Blog&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter" style="font-size: 20px;"></i></a>
                                                    </li>
                                                    {{-- <li>
                                                        <a href="#" target="popup" onclick="window.open('viber://forward?text=http://lifecyclebd.org/blog_details/{{$data['read_more_detail']->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-viber"></i></a>
                                                    </li> --}}
                                                    <li>
                                                        {{-- <a class="nav-link" href="#" target="popup" onclick="window.open('https://api.whatsapp.com/send?text=http://lifecyclebd.org/blog_details/{{$data['read_more_detail']->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp"></i></a> --}}

                                                        <a class="nav-link" href="#" target="popup" onclick="window.open('https://api.whatsapp.com/send/?phone&text=<?php urlencode("{{$data['read_more_detail']->title}}")?> https://lifecyclebd.org/blog_details/{{$data['read_more_detail']->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp" style="font-size: 20px;"></i></a>
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
                            <h4>সাম্প্রতিক পোস্ট</h4>
                        </div>
                        <div class="blog-sidebar_wrap">
                            <ul class="blog-sidebar_category">
                                @foreach($data['blood_news'] as $row)
                                    <li><a href="{{ route('news.details',['id'=>$row->id]) }}">{{$row->title}}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="blog-sidebar">
                        <div class="blog-sidebar_heading">
                            <h4>গুরুত্বপূর্ণ লিংক</h4>
                        </div>
                        <div class="blog-sidebar_wrap">
                            <ul class="blog-sidebar_tags">
                                <li><a href="/blog">ব্লগ</a></li>
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
