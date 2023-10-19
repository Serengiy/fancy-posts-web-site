<x-layouts.layout>
    <x-layouts.navs.second_nav :authors="$authors"/>

    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Slides Area -->
        <div class="hero-slides owl-carousel">
            <!-- Single Slide -->
            <x-hero-slide :posts="$latest_posts"/>


        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area clearfix mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag">Lifestyle</a>
                            <h4><a href="#" class="post-headline">Welcome to this Lifestyle blog</a></h4>
                            <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam
                                vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel
                                volutpat quam tincidunt. Morbi sodales, dolor id ultricies dictum</p>
                            @if($if_args)
                                <a href="/" class="btn original-btn">All posts</a>
                            @else
                                <a href="/" style="opacity: 0" class="btn original-btn">Explore</a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="img/blog-img/1.jpg" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="#">Lifestyle posts</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="img/blog-img/2.jpg" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="#">latest posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                {{--       POST LIST         --}}
                    @if(count($posts))
                    @foreach($posts as $post)
                        <x-post-card :post="$post" :latest_posts="$latest_posts"/>
                    @endforeach
                    @else
                        <h1 style="text-align: center">Posts not found</h1>
                    @endif

                </div>
                <!-- ##### Sidebar Area ##### -->
                <x-side-bar.side_card :tags="$tags" :posts="$latest_posts"/>
            </div>
        </div>
    </div>


    @include('components.layouts.pre_foot')


</x-layouts.layout>
{{--</body>--}}

{{--</html>--}}
