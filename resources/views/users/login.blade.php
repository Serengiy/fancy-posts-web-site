<x-layouts.layout>
    <x-layouts.navs.first_nav/>

    <div class="my-users-form-cont">
        <div class="col-6 my-users-form">
            <h5>Login form</h5>
            <form action="/authenticate" method="post" enctype="multipart/form-data" class="my-form">
                @csrf
                <div class="col-12">
                    <div class="group">
                        <input type="email" name="email" id="text" value="{{old('content')}}" required>
                        <label>Email</label>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="group">
                        <input name="password" type="password" id="text" value="{{old('content')}}" required>
                        <label>Password</label>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                    <div class="group">
                        <div class="">
                            <button type="submit" class="my-form-btn">Login</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>



</x-layouts.layout>
