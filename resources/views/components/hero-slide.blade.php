@foreach($posts as $post)

<div class="single-hero-slide bg-img" style='background-image: url({{asset('storage/'.$post->preview_pic)}});'>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="slide-content text-center">
                    <div class="post-tag">
                        <a href="/post/{{$post->id}}" data-animation="fadeInUp">lifestyle</a>
                    </div>
                    <h2 data-animation="fadeInUp" data-delay="250ms"><a href="/post/{{$post->id}}">{{$post->title}}</a></h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
