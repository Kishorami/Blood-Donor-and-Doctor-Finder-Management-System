<div>
    <!--==================== Blog grid ====================-->
        <section class="space light">
            <div class="container container-custom">
                
                <div class="row">
                    @foreach($data_recent['recent_event'] as $row)
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
                                        {{-- <p>{!! mb_substr($row->description, 0, 500) !!} </p> --}}
                                        <a href="{{ route('event.details',['id'=>$row->id]) }}" class="btn btn-outline-primary float-right">বিস্তারিত</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                    {{ $data_recent['recent_event']->links() }}
            </div>
        </section>
        <!--//End Blog Grid -->

</div>
