<div class="my-modal" id="my-modal-2" onclick="modal_likes_is_off()">
    <div class="my-modal-cont" onclick="stop_ppg(event)">
        <div class="my-modal-cont-likes">
            @foreach($liked as $user)
                <div class="my-modal-cont-likes-item">
                    <img class="user-avatar" src="{{asset('/storage/'.$user->profile_picture)}}">
                    <p>{{$user->first_name}}</p>
                </div>
            @endforeach
{{--                @foreach($liked as $user)--}}
{{--                    <div class="my-modal-cont-likes-item">--}}
{{--                        <img class="user-avatar" src="{{asset('/storage/'.$user->profile_picture)}}">--}}
{{--                        <p>{{$user->first_name}}</p>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

        </div>
        <div class="my-modal-cont-btns">
            <button type="button" onclick="modal_likes_is_off()" class="my-form-btn">Close</button>
        </div>
    </div>
</div>
