<div>
    @foreach( $data2['all_news'] as $row)
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

    {{ $data2['all_news']->links() }}
</div>
