<div>
    @foreach( $data2['upcoming_event'] as $row)
        <div class="blog-sidebar_content">
            <a href="{{ route('event.details',['id'=>$row->id]) }}" class="thumbnail-wrap">
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
                <p>
                    {{$row->title}}
                </p>
                <span>{{ $row->created_at }}</span>
            </div>
        </div>
    @endforeach
    {{ $data2['upcoming_event']->links() }}
</div>
