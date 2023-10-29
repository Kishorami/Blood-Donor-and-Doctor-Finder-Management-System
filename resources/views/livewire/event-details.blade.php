<div>

    @push('metaTags')

        <meta name="description" content="News Details">

        <meta property="og:title" content="{{$event->title}}" />
        <meta property="og:url" content="https://lifecyclebd.org/event_details/{{ $event_id }}" />
        <meta property="og:description" content="{{$event->title}}">
        <meta property="og:image" content="{{$event->pic_path}}">
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
                            {{-- <img src="images/blog-img.jpg" class="img-fluid" alt="#"> --}}
                            {{-- <div class="blog-date">
                                <h3>05</h3>
                                <span>JUN</span>
                            </div> --}}
                            <div class="blog-text-wrap border-0 pl-0 pr-0">
                                <h2>{{$event->title}}</h2>
                                <div class="blog-comment-top border-0">
                                    <p>প্রকাশের সময়কাল - </span> <i class="fa fa-clock"></i>{{ $event->created_at }} | নিউজ লিখেছেন - {{ $event->name }}</p>
                                </div>
                                {{-- <img src="{{asset($event->pic_path)}}" class="img-fluid" alt="#" style=""> --}}

                                @if(strpos($event->pic_path,"lifecyclebd.org"))
                                    <img src="{{$event->pic_path}}" class="img-fluid" alt="#">
                                @else
                                    <img src="https://lifecyclebd.org/{{$event->pic_path}}" class="img-fluid" alt="#">
                                @endif


                                <p>
                                    {!! $event->description !!}
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
                                                    {{-- @php
                                                        $url_to_share = URL::to('/').'/blood_info_details/'.$data['read_more_detail']->id;
                                                        // echo $url_to_share;
                                                        $url_to_share = 'http://lifecyclebd.org/read-more/detail/'.$data['read_more_detail']->id;
                                                        // echo $url_to_share;
                                                    @endphp --}}
                                                    <li>
                                                        <a class="nav-link" href="#" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://lifecyclebd.org/event_details/{{$event->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-facebook-f" style="font-size: 20px;"></i></a>
                                                    </li>
                                                    <li>
                                                        {{-- <a href="#" target="popup" onclick="window.open('https://twitter.com/intent/tweet?text=http://lifecyclebd.org/event_details/{{$event->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter"></i></a> --}}

                                                        <a href="#" target="popup" onclick="window.open('https://twitter.com/share?text={{$event->title}}&url=https://lifecyclebd.org/event_details/{{$event->id}}&hashtags=#LIFECYCLEBD,#HealthAwareness,#Health&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-twitter" style="font-size: 20px;"></i></a>
                                                    </li>
                                                    {{-- <li>
                                                        <a href="#" target="popup" onclick="window.open('viber://forward?text=http://lifecyclebd.org/event_details/{{$event->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-viber"></i></a>
                                                    </li> --}}
                                                    <li>
                                                        {{-- <a class="nav-link" href="#" target="popup" onclick="window.open('https://api.whatsapp.com/send?text=http://lifecyclebd.org/event_details/{{$event->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp"></i></a> --}}

                                                        <a class="nav-link" href="#" target="popup" onclick="window.open('https://api.whatsapp.com/send/?phone&text=<?php urlencode("{{$event->title}}")?> https://lifecyclebd.org/event_details/{{$event->id}}&display=popup','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp" style="font-size: 20px;"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                        @livewire('event-recent')
                        {{-- <!--==================== Blog grid ====================-->
                        <section class="space light">
                            <div class="container container-custom">
                                
                                <div class="row">
                                    @foreach($data['recent_event'] as $row)
                                        <div class="col-md-6">
                                            <div class="blog-grid-wrap">
                                                
                                                <div class="blog-grid_content">
                                                    <div class="blog-grid_text">
                                                        <a href="{{ route('event.details',['id'=>$row->id]) }}">
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
                                    {{ $data['recent_event']->links() }}
                            </div>
                        </section>
                        <!--//End Blog Grid -->
 --}}
                    
                </div>
                <div class="col-md-4">
                    
                    <div class="blog-sidebar">
                        <div class="blog-sidebar_heading">
                            <h4>আসন্ন কর্মসূচী</h4>
                        </div>
                        <div class="blog-sidebar_wrap">
                            @livewire('upcoming-event')

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
