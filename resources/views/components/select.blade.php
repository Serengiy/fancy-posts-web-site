<div onchange="getBtn({{$user->id}}, event.target.options.selectedIndex)">
    <select id="select_id">
        @foreach($options as $key => $option)
          <option value="{{$key}}" {{$key == $user->role ? 'selected': ''}}>{{$option}}</option>
        @endforeach
    </select>
{{--    <input id="user-current-role" type="hidden" value="{{$user->id}}">--}}
</div>
