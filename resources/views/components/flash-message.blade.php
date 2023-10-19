@if(session()->has('message'))
    <div x-data="{show: true}"  x-init="setTimeout(()=>show=false, 3000)" x-show="show"
         class="alert alert-secondary flash-message" role="alert">
        <p class="text-center" id="main">
            {{session('message')}}
        </p>
    </div>
@endif
