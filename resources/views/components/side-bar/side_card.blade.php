<div class="col-12 col-md-4 col-lg-3">
    <div class="post-sidebar-area">

        <!-- Widget Area -->
{{--        <div class="sidebar-widget-area">--}}
{{--            <form action="#" class="search-form">--}}
{{--                <input type="search" name="search" id="searchForm" placeholder="Search">--}}
{{--                <input type="submit" value="submit">--}}
{{--            </form>--}}
{{--        </div>--}}



        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">Advertisement</h5>
            <a href="#"><img src="{{url('img/bg-img/add.gif')}}" alt=""></a>
        </div>

        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">Latest Posts</h5>

            <div class="widget-content">

                @foreach($posts as $post)
                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                        <img src="{{asset('storage/'.$post->preview_pic)}}" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                        <a href="#" class="post-tag">Lifestyle</a>
                        <h4><a href="/posts/{{$post->id}}" class="post-headline">{{$post->title}}</a></h4>
                        <div class="post-meta">
                            <p><a href="#">{{$post->created_at->format('d M')}}</a></p>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>

        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">Tags</h5>
            <div class="widget-content">
                <ul class="tags">
                    @foreach(explode(', ', $tags) as $tag)
                    <li><a href="/?tag={{$tag}}">{{$tag}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
