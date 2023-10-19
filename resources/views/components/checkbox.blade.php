@props(['tagsCsv'])

@php
    $tags = explode(',',$tagsCsv)
@endphp

@foreach($tags as $tag)
<div class="col-12 col-md-1">
    <div class="cust-checkbox">
        <input value="{{$tag}}" type="checkbox"  id="tags" name="tags[]">
        <label>{{$tag}}</label>
    </div>
</div>
@endforeach


