<x-layouts.layout>
    <x-modal.my_modal/>
    <x-modal.liked_modal :liked="$whoLiked"/>
    <x-layouts.navs.second_nav :authors="$authors"/>
    <div class="single-blog-wrapper section-padding-0-100">

        <!-- Single Blog Area  -->
        <div class="single-blog-area blog-style-2 mb-50">
            <div class="single-blog-thumbnail">
                <img src="{{asset('storage/'.$post->main_pic)}}" alt="">
                <div class="post-tag-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="post-date">
                                    <a href="#">{{$post->created_at->format('d')}} <span>{{$post->created_at->format('M')}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- ##### Post Content Area ##### -->
                <div class="col-12 col-lg-9">
                    <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag">Lifestyle</a>
                            <h4><a href="#" class="post-headline mb-0">{{$post->title}}</a></h4>
                            <div class="post-meta mb-50">
                                <p>By <a href="#">{{$post->user['first_name']}} {{$post->user['last_name']}}</a></p>
                                @if($comments->count())
                                <p>{{$comments->count()}} comments</p>
                                @endif
                                <div class="col-12">
                                    <form action="/likes" method="POST" class="likes-form">
                                        @csrf
                                        <p id="like-area" onclick="modal_likes_is_on()"> Likes: {{$likes}}</p>
                                        <input type="hidden" id="post_id" value="{{$post->id}}">
                                        @auth()
                                        <p id="heart" onclick="like(event)">
                                            @if((auth()->user()->likes()->where('post_id', $post->id)->get()->count()) ? true : false)
                                                <i class="liked-icon"></i>
                                            @else
                                                <i class="like-icon"></i>
                                             @endif
                                        </p>
                                        @else
                                            <a id="heart" href="{{url('/create')}}"><i class="like-icon"></i></a>
                                        @endauth
                                    </form>
                                </div>


                            </div>
                            <p>{{$post->content}}</p>
                        </div>
                        <div class="container">
                            <div class="row">
                                @if(auth()->check() and $post->user_id == auth()->user()->id)
                                <div class="col">
                                    <button onclick="modal_is_on({{$post->id}})" class="btn original-btn">delete</button>
                                </div>
                                <div class="col">
                                    <form action="/posts/{{$post->id}}/update">
                                        <x-ui.button>update</x-ui.button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- About Author -->
                    <div class="blog-post-author mt-100 d-flex">
                        <div class="author-thumbnail">
                            <img src="{{asset('storage/'.$post->user->profile_picture)}}" alt="">
                        </div>
                        <div class="author-info">
                            <div class="line"></div>
                            <span class="author-role">Author</span>
                            <h4><a href="#" class="author-name">{{$post->user->first_name}} {{$post->user->last_name}}</a></h4>
                            <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero.</p>
                        </div>

                    </div>

                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix mt-70">
                        @if($comments->count())
                        <h5 class="title">Comments</h5>


                        <ol>
                            <!-- Single Comment Area -->
{{--                            <li class="single_comment_area">--}}
{{--                                <!-- Comment Content -->--}}
{{--                                <div class="comment-content d-flex">--}}
{{--                                    <!-- Comment Author -->--}}
{{--                                    <div class="comment-author">--}}
{{--                                        <img src="{{url('img/bg-img/b7.jpg')}}" alt="author">--}}
{{--                                    </div>--}}
{{--                                    <!-- Comment Meta -->--}}
{{--                                    <div class="comment-meta">--}}
{{--                                        <a href="#" class="post-date">March 12</a>--}}
{{--                                        <p><a href="#" class="post-author">William James</a></p>--}}
{{--                                        <p>Efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>--}}
{{--                                        <a href="#" class="comment-reply">Reply</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <ol class="children">--}}
{{--                                    <li class="single_comment_area">--}}
{{--                                        <!-- Comment Content -->--}}
{{--                                        <div class="comment-content d-flex">--}}
{{--                                            <!-- Comment Author -->--}}
{{--                                            <div class="comment-author">--}}
{{--                                                <img src="{{url('img/bg-img/b7.jpg')}}" alt="author">--}}
{{--                                            </div>--}}
{{--                                            <!-- Comment Meta -->--}}
{{--                                            <div class="comment-meta">--}}
{{--                                                <a href="#" class="post-date">March 12</a>--}}
{{--                                                <p><a href="#" class="post-author">William James</a></p>--}}
{{--                                                <p>Efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>--}}
{{--                                                <a href="#" class="comment-reply">Reply</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ol>--}}
{{--                            </li>--}}

{{--                            <x-comment-card :comments="$comments"/>--}}
                            @include('components.comment-card', ['comments' => $post->comments, 'post_id' => $post->id])

                        </ol>
                        @else
                            <h5 class="title">No comments yet</h5>
                        @endif
                    </div>

                    <div class="post-a-comment-area mt-70">

                        <!-- Reply Form -->
                        @auth
                            <h5>Leave a comment</h5>
                            <form action="/store-comment" method="post" id="comment-form">
                                @method('post')
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-2 text-center" >
                                        <img class="user-avatar-comment-area" src="{{asset('/storage/'.auth()->user()->profile_picture)}}">
                                    </div>

                                    <div class="col-12 col-md-10">
                                        <div class="group" >
                                            <textarea name="comment"  required></textarea>
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <input type="hidden" name="parent_id" id="reply-to-form" value="">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label id="comment-label">Comment</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" id="comment-submit-btn" class="btn original-btn">leave the comment</button>
                                        <button type="button" onclick="getDefault()" id="comment-cancel-btn" class="btn original-btn">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <h5>You have to be authorised to leave the comments</h5>
                        @endauth


                    </div>

                </div>
                <x-side-bar.side_card :tags="$tags" :posts="$latest_posts"/>
            </div>
        </div>
    </div>

</x-layouts.layout>
