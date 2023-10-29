<div>

    <div class="col-md-12 col-lg-8" style="margin:auto;">
        <div class="why-choose_block">
            <div class="heading-style1">
                {{-- <span>Why Us</span> --}}
                {{-- <h2>Frequently Asked Question</h2> --}}
                <h2>রক্তদান বিষয়ক প্রশ্নোত্তর/Frequently Asked Question</h2>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing <br> elit, sed do eius mod tempor inc ididuntut</p> --}}
                <hr>
            </div>
            @foreach($faqs as $faq)
                <div class="whychoose-wrap">
                    {{-- <img src="images/icon1.png" alt="#"> --}}
                    <div class="whychoose-text_block">
                        <h4>{{ $faq->question }}</h4>
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach
            <hr>
        </div>
    </div>
    {{-- <h1>FAQ</h1>
    @foreach($faqs as $faq)
        {{ $faq->question }}
        <br>
        {{ $faq->answer }}
        <hr>
    @endforeach --}}
</div>
