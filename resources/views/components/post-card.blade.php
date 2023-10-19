{{--{{$tags=explode(', ', $post->tags)}}--}}

{{--<p>{{$tags}}</p>--}}
<div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1000ms">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <div class="single-blog-thumbnail">
                <img src="{{asset('storage/'.$post->preview_pic)}}" alt="">
                <div class="post-date">
                    <a href="/?date={{$post->created_at->format('d')}}">{{$post->created_at->format('d')}} <span>{{$post->created_at->format('M')}}</span></a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <!-- Blog Content -->
            <div class="single-blog-content">
                <div class="line"></div>
                <div class="card-tag-display">
                    @foreach(explode(', ', $post->tags) as $tag)
                        <a href="/?tag={{$tag}}" class="post-tag">{{$tag}}</a>
                    @endforeach
                </div>
                <a href="/post/{{$post->id}}" class="my-post-card-title">{{$post->title}}</a>
                <p class="post-content">{{$post->content}}</p>
                <div class="post-meta">
                    <p>By <a href="#">{{$post->user['first_name']}} {{$post->user['last_name']}}</a></p>
                    <p>{{$post->likes()->count()}} {{($post->likes()->count() == 1) ? 'like': 'likes'}}</p>
                    @if($post->comments()->count())
                    <p>{{$post->comments()->count()}} {{($post->comments()->count() == 1) ? 'Comment': 'Comments'}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
