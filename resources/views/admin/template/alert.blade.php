@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@elseif(session('warning'))
<div class="alert alert-warning">{{session('warning')}}</div>
@elseif(session('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif