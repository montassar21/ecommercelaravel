@if($message=Session::get('success'))
<div class="alert alert-success">
    {{$message}}
</div>
@endif
@if($message=Session::get('error'))
<div class="alert alert-daneger">
    {{$message}}
</div>
@endif