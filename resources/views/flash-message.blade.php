@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button class="border-0 btn" type="button" class="close" data-dismiss="alert">X</button>
    {{ $message }}
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button class="border-0 btn" type="button" class="close" data-dismiss="alert">X</button>
    {{ $message }}
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button class="border-0 btn" type="button" class="close" data-dismiss="alert">X</button>
    {{ $message }}
</div>
@endif
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button class="border-0 btn" type="button" class="close" data-dismiss="alert">X</button>
    {{ $message }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <button class="border-0 btn" type="button" class="close" data-dismiss="alert">X</button>
    Check the following errors :(
</div>
@endif