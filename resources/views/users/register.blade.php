<x-layouts.layout>
    <x-layouts.navs.first_nav/>


        <div class="my-users-form-cont">
            <div class="col-6 my-users-form">
                <h5>Registration form</h5>
                <form action="{{url('/users')}}" method="post" enctype="multipart/form-data" class="my-form">
                @csrf
                    <div class="col-12">
                        <div class="group">
                            <input name="first_name" id="text" value="{{old('first_name')}}" required>
                            <label>First name</label>
                            @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="group">
                            <input name="last_name" id="text" value="{{old('last_name')}}" required>
                            <label>Last name</label>
                            @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="group">
                            <input type="email" name="email" id="text" value="{{old('email')}}" required>
                            <label>Email</label>
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="group">
                            <input name="password" type="password" id="text" value="{{old('password')}}" required >
                            <label>Password</label>
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="group">
                            <input name="password_confirmation" type="password" id="text" value="{{old('password_confirmation')}}" required >
                            <label>Repeat the password</label>
                            @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="group">
                                <input type="file"  name="profile_picture" id="profile-pict" onchange="getPic('preview-pic-label')">
                                <label for="profile-pict" id="preview-pic-label" class="choose-picture-label">Choose profile picture</label>
                        </div>
                        @error('profile_picture')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <br>
                    <div class="col-12">
                        <div class="group">
                            <div class="">
                                <button type="submit" class="my-form-btn">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</x-layouts.layout>
