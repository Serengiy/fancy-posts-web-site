<x-layouts.layout>
    <x-layouts.navs.first_nav/>
    <div class="container">
        <form action="{{url('/posts')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 ">
                    <div class="group">
                        <input type="text" name="title" value="{{old('title')}}" required>
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

                    <x-checkbox :tagsCsv="$tags"/>
                <div class="col-12" style="margin-top: 20px">
                    @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>


                <div class="choose-pic-group col-12">
                    <div class="col-4">
                        <div class=" choose-picture">
                            <input type="file"   name="main_pic" id="main-pic" class="choose-picture-input" onchange="getPic('main-pic-label')">
                            <label for="main-pic" id="main-pic-label" class="choose-picture-label">Choose main picture</label>
                        </div>
                        <div class="" style="margin-top: 40px">
                            @error('main_pic')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class=" choose-picture">
                            <input type="file"  name="preview_pic" id="preview-pic" onchange="getPic('preview-pic-label')">
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
                        <textarea name="content" id="text"  required>{{old('content')}}</textarea>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Content</label>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <x-ui.button>create</x-ui.button>
            </div>
        </form>
    </div>

</x-layouts.layout>
