<x-layouts.layout>
    <x-layouts.navs.first_nav/>
    <div class="container">
        <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data" id="form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 ">
                    <div class="group">
                        <input type="text" value="{{$post->title}}" name="title"  required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Title</label>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="group">
                        <label>Tags</label>
                    </div>
                </div>

                @props(['tags'])

                @php
                    $tags = explode(',',$tags)
                @endphp

                @foreach($tags as $tag)
                    <div class="col-12 col-md-1">
                        <div class="cust-checkbox">
                            <input value="{{$tag}}" type="checkbox"  id="tags" name="tags[]">
                            <label>{{$tag}}</label>
                        </div>
                    </div>
                @endforeach

                <div class="col-12" style="margin-top: 20px">
                    @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="choose-pic-group col-12">
                <div class="col-3">
                    <div class=" choose-picture">
                        <input type="file"  name="main_pic" id="main-pic" onchange="getPic('main-pic-label')" class="choose-picture-input">
                        <label for="main-pic" id="main-pic-label" class="choose-picture-label">Choose main picture</label>
                    </div>
                    <div class="" style="margin-top: 40px">
                        @error('main_pic')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class=" choose-picture">
                        <input type="file"  name="preview_pic" onchange="getPic('preview-pic-label')" id="preview-pic">
                        <label for="preview-pic" id="preview-pic-label" class="choose-picture-label">Choose preview picture</label>
                    </div>
                    <div class="" style="margin-top: 40px">
                        @error('preview_pic')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                </div>
                <div class="col-12">
                    <div class="group">
                        <textarea name="content" id="text" required>{{$post->content}}</textarea>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Content</label>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>


                <div class="sidebar-widget-area">
                    <div class="widget-content">
                        <div  class="newsletterForm">
                            <button type="submit"  class="btn original-btn">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layouts.layout>
